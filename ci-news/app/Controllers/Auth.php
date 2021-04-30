<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Services as Services;

/* @Author GEOL <big9401@gmail.com>
 * @see 로그인 인증 관련 컨트롤러
 * */
class Auth extends Controller {

  public function index() {

  }

  public function createSession() {
    $session = Services::session();
    $mySession = array(
      'name' => 'geol',
      'city' => 'seoul'
    );
    $session->set($mySession);

//    echo '<pre>';
//    var_dump($session);
//    echo '</pre>';
  }

  public function checkSession() {
    $session = Services::session();
    if( $session->has('name') ) {
      echo $session->get('name');
      echo '</br>';
      echo 'session exist';
    } else {
      echo 'session not exist';
    }
  }

  public function destroySession() {
    $session = Services::session();
    if( $session->has('name') ) {
      $session->destroy();
      echo '</br>';
      echo 'session destroy';
    } else {
      echo 'error here';
    }
  }

  public function login() {
//    $this->createSession();
//    $this->response->redirect('/');

    echo view('header');
    echo view('auth/login');
  }

  public function logout() {
    $this->destroySession();
    $this->response->redirect('/');
  }

  public function loginProc() {

    $this->createSession();
  }
}