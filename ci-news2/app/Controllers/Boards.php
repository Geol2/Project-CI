<?php namespace App\Controllers;

use App\Models\ResourceModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;
use Exception;

class Boards extends ResourcePresenter
{
  protected $now;
  protected $getPage;

  public function __construct()
  {
    /* 헬퍼 로드
    * vendor\CodeIgniter4\system\helpers\date_helper.php
    * "_help" 를 제외하고 helper('date').
    * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
    */
    helper('date');
    try {
      $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
    } catch (Exception $e) {
      die($e->getMessage());
    }
    $this->now = date("Y-m-d H:i:s", $unix); // UNIX 타임스탬프를 년/월/일 시간:분:초 로 변경.
  }

	public function index()
  {
    // $request = service('request');

    // 게시판 데이터 불러오기
    $RM = new ResourceModel();
    $count = $RM->getBoardCount();
    $pageSize = 5; // 한 페이지당 게시글 수 설정 변수

    $totalPageTmp = $count / $pageSize;
    $totalPage = ceil($totalPageTmp); // 바인딩할 페이징 계산

    $this->getPage = $this->request->getGet('page');

    $contentPaging = $RM->setContentPaging($this->getPage, $pageSize);
    $data = $RM->getListBoard($contentPaging, $pageSize, $this->getPage);

    $result['list'] = $data['list'];
    $result['count'] = $totalPage;

    echo view('/header');
    echo view('/boards/table/table', $result);
    echo view('/boards/table/board');
	}

	public function new()
    {
      echo view('/header');
      echo view('boards/new' );
    }

  public function create(): ResponseInterface
  {
    // echo 'function create exec';
    $request = service('request');

    $sub = $request->getPost('sub');
    $content = $request->getPost('content');
    $writer = $request->getPost('writer');

    $data = array(
        'SUB' => $sub,
        'CONTENT' => $content,
        'WRITER' => $writer
    );

    $RM = new ResourceModel();
    $RM->setDataBoard($data);

    echo view('/header');
    return $this->response->redirect('/Boards');
  }

  function show($id = null)
  {
    $sno = $id;
    // 게시판 한 개 데이터 불러오기
    $RM = new ResourceModel();
    $data = $RM->getBoard($sno);

    $result = array(
        'SNO' => $data[0]['SNO'],
        'SUBJECT_NAME' => $data[0]['SUBJECT_NAME'],
        'CONTENT' => $data[0]['CONTENT'],
        'WRITER' => $data[0]['WRITER'],
        'DATE_CHAR' => $data[0]['DATE_CHAR']
    );

    echo view('/header');
    echo view("/Boards/content", $result);
  }

  function edit($id = null) {
    // echo "function edit";
    $RM = new ResourceModel();
    $data = $RM->getBoard($id); // 수정할 데이터 불러오기

    $result = array(
        'SNO' => $data[0]['SNO'],
        'SUBJECT_NAME' => $data[0]['SUBJECT_NAME'],
        'CONTENT' => $data[0]['CONTENT'],
        'WRITER' => $data[0]['WRITER'],
        'DATE_CHAR' => $data[0]['DATE_CHAR']
    );

    echo view('/header');
    echo view("/Boards/edit", $result );
  }

  function update($id = null): ResponseInterface
  {
    //echo "function update";
    $request = service('request');

    $sno = $id; // $request->getPost('sno');
    $sub = $request->getPost('sub');
    $content = $request->getPost('content');
    $writer = $request->getPost('writer');
    $date = $this->now;

    $result = array(
        'SNO' => $sno,
        'SUBJECT_NAME' => $sub,
        'CONTENT' => $content,
        'WRITER' => $writer,
        'DATE_CHAR' => $date
    );

    $RM = new ResourceModel();
    $RM->udtDataBoard($sno, $result);

    return $this->response->redirect('/Boards');
  }

  function remove($id = null): ResponseInterface
  {

    $RM = new ResourceModel();
    $RM->rmvDataBoard($id);

    return $this->response->redirect('/Boards');
  }
}

