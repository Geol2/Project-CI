<?php namespace App\Controllers;

use App\Models\BoardModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;
use Exception;

/* @author GEOL <big9401@gmail.com>
 * @see ResourcePresenter Boards
 */
class Boards extends ResourcePresenter
{
  /*
   * 시간을 담아내는 변수
   */
  protected string $now;

  /* @author GEOL <big9401@gmail.com>
   * @see 헬퍼 로드 vendor\CodeIgniter4\system\helpers\date_helper.php
   * "_help" 를 제외하고 helper('date')., "_help" 를 제외하고 helper('date').
   * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
   */
  public function __construct() {
    helper('date');
    try {
      $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
    } catch (Exception $e) {
      die($e->getMessage());
    }
    $this->now = date("Y-m-d H:i:s", $unix); // UNIX 타임스탬프를 년/월/일 시간:분:초 로 변경.
  }

  /* @param void
   * @author GEOL <big9401@gmail.com>
   * @return int
   * @see 게시판 테이블
   * */
	public function index(): int {
    // 게시판 데이터 불러오기
    $boardModel = new BoardModel();

    $data = [
      'content' => $boardModel->paginate(2),
      'pager' => $boardModel->pager,
    ];

    echo view('/header');
    echo view('/boards/table/table', $data);
    echo view('/boards/table/board');
    return 0;
	}

  /* @param void
   * @author GEOL <big9401@gmail.com>
   * @return int 0
   * @see 새글 작성
   */
	public function new(): int
  {
    echo view('/header');
    echo view('boards/new' );
    return 0;
  }

  /* @param void
   * @return ResponseInterface
   * @throws \ReflectionException
   * @see 게시글 한 개 추가하기
   * @author GEOL <big9401@gmail.com>
   */
  public function create(): ResponseInterface {
    $sub = $this->request->getPost('sub');
    $content = $this->request->getPost('content');
    $writer = $this->request->getPost('writer');

    $data = array(
      'SUB' => $sub,
      'CONTENT' => $content,
      'WRITER' => $writer
    );

    $RM = new BoardModel();
    $RM->insert($data);

    echo view('/header');
    return $this->response->redirect('/Boards');
  }

  /* @param string $id
   * @return int 0
   * @throws \ReflectionException
   * @author GEOL <big9401@gmail.com>
   * @see 게시글 한 개를 보여줌.
   */
  function show($id = null): int {
    $sno = $id;
    // 게시판 한 개 데이터 불러오기
    $RM = new BoardModel();
    $data = $RM->find($sno);

    // 조회 수 증가 카운트 하는 부분.
    $hit = $data['HIT'] + 1;

    $result = array(
      'SNO' => $data['SNO'],
      'SUBJECT_NAME' => $data['SUBJECT_NAME'],
      'CONTENT' => $data['CONTENT'],
      'WRITER' => $data['WRITER'],
      'DATE_CHAR' => $data['DATE_CHAR'],
      'HIT' => $hit
    );
    
    // 카운트 증가하는 부분.
    $RM->update($sno, $result);

    echo view('/header');
    echo view("/Boards/content", $result);
    return 0;
  }

  /* @param string $id
   * @return int 0
   * @author GEOL <big9401@gmail.com>
   * @see 게시글 한개 수정
   */
  function edit($id = null) : int {
    // echo "function edit";
    $RM = new BoardModel();
    $data = $RM->find($id); // 수정할 데이터 불러오기

    $result = array(
      'SNO' => $data['SNO'],
      'SUBJECT_NAME' => $data['SUBJECT_NAME'],
      'CONTENT' => $data['CONTENT'],
      'WRITER' => $data['WRITER'],
      'DATE_CHAR' => $data['DATE_CHAR'],
      'HIT' => $data['HIT']
    );

    echo view('/header');
    echo view("/Boards/edit", $result );
    return 0;
  }

  /* @param string $id
   * @return ResponseInterface
   * @throws \ReflectionException
   * @author GEOL <big9401@gmail.com>
   * @see 게시글 한개 수정하기
   */
  function update($id = null): ResponseInterface {
    $sno = $id; // $request->getPost('sno');
    $sub = $this->request->getPost('sub');
    $content = $this->request->getPost('content');
    $writer = $this->request->getPost('writer');
    $date = $this->now;
    $hit = $this->request->getPost('hit');

    $result = array(
      'SNO' => $sno,
      'SUBJECT_NAME' => $sub,
      'CONTENT' => $content,
      'WRITER' => $writer,
      'DATE_CHAR' => $date,
      'HIT' => $hit
    );
    
    // 게시글 데이터베이스 업데이트
    $RM = new BoardModel();
    $RM->update($sno, $result);

    return $this->response->redirect('/Boards');
  }

  /* @param string $id
   * @return ResponseInterface
   * @author GEOL <big9401@gmail.com>
   * @see 게시글 한 개 삭제
   */
  function remove($id = null): ResponseInterface
  {
    $RM = new BoardModel();
    $RM->delete($id);

    return $this->response->redirect('/Boards');
  }
}

