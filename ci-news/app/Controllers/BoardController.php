<?php namespace App\Controllers;

use App\Models\ContentModel;
use CodeIgniter\Controller;

class BoardController extends Controller
{
    public function index()
    {
        echo view('board');
    }

    public function write() {
        echo view("/board/write");
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

        return $this->response->redirect('/');
    }

    public function setDataContent() {
        $CM = new ContentModel();
        $data = $CM->getModelContentDownload();
    }
}