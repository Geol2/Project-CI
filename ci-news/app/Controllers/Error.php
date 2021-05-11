<?php namespace App\Controllers;


use CodeIgniter\Controller;

class Error extends Controller
{
  public function index() {
    echo 'Error index';
  }

  public function getHome() {
    echo view('/');
  }
}