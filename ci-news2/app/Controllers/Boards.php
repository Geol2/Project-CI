<?php

namespace App\Controllers;

use App\Models\ResourceModel;
use CodeIgniter\RESTful\ResourceController;

class Boards extends ResourceController
{
    protected $now;

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
        $CM = new ResourceModel();
        $data = $CM->getListUser();

        $result = array(
            'SNO' => $data['SNO'],
            'SUBJECT_NAME' => $data['SUBJECT_NAME'],
            'CONTENT' => $data['CONTENT'],
            'WRITER' => $data['WRITER'],
            'DATE_CHAR' => $data['DATE_CHAR']
        );

        echo view('/boards/table', $result);
        echo view('/boards/board');
	}

	public function new()
    {
        $data = array(
            'data' => 1
        );
        return view('boards/new', $data);
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

        $CM = new ResourceModel();
        $CM->setDataUser($data);

        return $this->response->redirect('/Boards');
    }

    function show($id = null)
    {
        $sno = $id;
        // 게시판 데이터 불러오기
        $CM = new ResourceModel();
        $data = $CM->getUser($sno);

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
        $CM = new ResourceModel();
        $data = $CM->getUser($id); // 수정할 데이터 불러오기

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
