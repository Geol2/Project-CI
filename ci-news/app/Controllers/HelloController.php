<?php namespace App\Controllers;

use CodeIgniter\Controller;

class HelloController extends Controller
{
    public function index($name = 'World') {
        echo 'Hello'.$name.'!';
    }
}