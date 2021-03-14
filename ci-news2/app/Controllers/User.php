<?php namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller {
    public function index() {
      echo view('header');
      echo view('login/register');
    }
}