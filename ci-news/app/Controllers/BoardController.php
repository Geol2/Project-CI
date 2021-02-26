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

    public function getDataContent() {
        $request = service('request');

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

        return $this->response->redirect('/boards');
    }

    public function setDataContent($seg1 = false, $seg2 = false) {
        // echo $seg2;

        $CM = new ContentModel();
        $data = $CM->setModelContentUpload2($seg1, $seg2);


        return view('/boards/edit');
    }
}