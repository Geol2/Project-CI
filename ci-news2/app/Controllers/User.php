<?php namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller {

  public function __construct() {

  }

  public function index() {

  }

  public function sign() {
    echo view('header');
    echo view('auth/register');
  }

  public function login() {
    // If session == true, go to home page
    if (session()->get('data')) {
      if (session()->get('data')['role_id'] == 1) {
        // redirect to Admin
        return redirect()->to('/admin');
      } elseif (session()->get('data')['role_id'] == 2) {
        // Redirect to Member
        return redirect()->to('/user');
      }
    }

    $data = [
      'title' => 'Login',
      'validation' => \Config\Services::validation()
    ];

    echo view('header');
    echo view('auth/login', $data);
  }

  public function register() {
    echo 'function register()';
  }

  public function logon() {
    echo 'function logon()';
    $id = $this->request->getPost('id');
    $pwd = $this->request->getPost('password');

    echo $id;
    echo md5($pwd);
  }
}