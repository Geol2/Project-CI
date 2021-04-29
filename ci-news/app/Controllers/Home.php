<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller {
  function index() {
      echo view('/header');
      echo view('/home');
  }
}