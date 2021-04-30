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

  public function login() {
    echo 'Hello Auth login()';
//    $session = Services::session($config);
    $session = session();

    var_dump($session);
    echo '</pre>';
  }
}