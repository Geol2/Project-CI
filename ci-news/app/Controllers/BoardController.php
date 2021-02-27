<?php namespace App\Controllers;

use App\Models\ContentModel;
use CodeIgniter\Controller;

class BoardController extends Controller
{
    // 게시판
    public function index()
    {
        // 게시판 데이터 불러오기
        $CM = new ContentModel();
        $data = $CM->getModelContentDownload();

        $result = array(
            'SNO' => $data['SNO'],
            'SUBJECT_NAME' => $data['SUBJECT_NAME'],
            'CONTENT' => $data['CONTENT'],
            'WRITER' => $data['WRITER'],
            'DATE_CHAR' => $data['DATE_CHAR']
        );

        echo view('/boards/board', $result);
    }

    // 글 작성 페이지
    public function post() {
        echo view("/boards/post");
    }

    // 뷰에서 글 작성 전송 요청 시 실행되는 함수
    public function getDataContent() {
        $request = service('request');

        /*
         * $_POST
         */
        $sub = $request->getPost('sub');
        $content = $request->getPost('content');
        $writer = $request->getPost('writer');

        $params = array(
            'sub' => $sub,
            'content' => $content,
            'writer' => $writer
        );

        $CM = new ContentModel();
        $CM->setModelContentUpload1($params);

        return $this->response->redirect('/boards/1');
    }

    // 수정 페이지 로드
    public function edit($seg1 = false) {
        // echo $seg1;
        $data['data'] = $seg1;
        return view('/boards/edit', $data);
    }

    // 뷰에서 수정 요청 시 실행되는 함수.
    public function setDataContent($seg = false) {
        // echo $seg;
        $request = service('request');

        $sub = $request->getPost('sub');
        $content = $request->getPost('content');

        $data = array(
            "SUBJECT_NAME" => $sub,
            "CONTENT" => $content
        );

        $CM = new ContentModel();
        $CM->setModelContentUpload2($seg, $data);

        return $this->response->redirect('/boards/1');
    }

    public function delDataContent($seg = false) {
        $data = $seg;

        $CM = new ContentModel();
        $CM->delModelData($data);

        return $this->response->redirect('/boards/1');
    }
}