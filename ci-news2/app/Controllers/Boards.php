<?php

namespace App\Controllers;

use App\Models\ResourceModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\RESTful\ResourcePresenter;

class Boards extends ResourcePresenter
{
    protected $now;
    protected $pager;

    public function __construct()
    {
        /* 헬퍼 로드
         * vendor\CodeIgniter4\system\helpers\date_helper.php
         * "_help" 를 제외하고 helper('date').
         * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
         */
        helper('date');
        $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
        $this->now = date("Y-m-d H:i:s", $unix); // UNIX 타임스탬프를 년/월/일 시간:분:초 로 변경.

    }

	public function index()
    {
        // 게시판 데이터 불러오기
        $RM = new ResourceModel();
        $data = $RM->getListUser();
        $count = $RM->getUserCount();

        $result['list'] = $data['list'];
        

        echo view('/boards/table', $result);
        echo view('/boards/board');
	}

	public function new()
    {
        return view('boards/new' );
    }

    public function create()
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
        $RM->setDataUser($data);

        return $this->response->redirect('/Boards');
    }

    function show($id = null)
    {
        $sno = $id;
        // 게시판 한 개 데이터 불러오기
        $RM = new ResourceModel();
        $data = $RM->getUser($sno);

        $result = array(
            'SNO' => $data[0]['SNO'],
            'SUBJECT_NAME' => $data[0]['SUBJECT_NAME'],
            'CONTENT' => $data[0]['CONTENT'],
            'WRITER' => $data[0]['WRITER'],
            'DATE_CHAR' => $data[0]['DATE_CHAR']
        );

        // echo $result." function show";
        echo view("/Boards/content", $result);
    }

    function edit($id = null) {
        // echo "function edit";
        $RM = new ResourceModel();
        $data = $RM->getUser($id); // 수정할 데이터 불러오기

        $result = array(
            'SNO' => $data[0]['SNO'],
            'SUBJECT_NAME' => $data[0]['SUBJECT_NAME'],
            'CONTENT' => $data[0]['CONTENT'],
            'WRITER' => $data[0]['WRITER'],
            'DATE_CHAR' => $data[0]['DATE_CHAR']
        );

        echo view("/Boards/edit", $result );
    }

    function update($id = null)
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
        $RM->udtDataUser($sno, $result);

        return $this->response->redirect('/Boards');
    }

    function remove($id = null) {

        $RM = new ResourceModel();
        $RM->rmvDataUser($id);

        return $this->response->redirect('/Boards');
    }
}
