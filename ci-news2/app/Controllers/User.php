<?php namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller {

  public function __construct() {

  }

  public function index() {

  }

  public function sign() {
    echo view('header');
    echo view('login/register');
  }

  public function login() {
    echo view('header');
    echo view('login/login');
  }

  public function register() {
    echo 'function register()';
  }

  public function logon() {
    echo 'function logon()';
  }
}