<?php namespace App\Controllers;

use App\Models\ContentModel;
use CodeIgniter\Controller;

class BoardController extends Controller
{
    public function index()
    {
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

    public function write() {
        echo view("/boards/write");
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
        $CM->setModelContentUpload($params);

        return $this->response->redirect('/boards/board');
    }

    public function setDataContent() {


    }
}