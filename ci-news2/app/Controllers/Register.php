<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Register extends Controller {
    public function index() {
      echo view('header');
      echo view('login/register');
    }
}