<?php namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends Controller
{
    public function index($slug = false)
    {

        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);

        if (empty($data['news']))
        {
            throw new PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);
    }
}