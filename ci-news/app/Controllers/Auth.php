<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Services as Services;
use CodeIgniter\HTTP\ResponseInterface as ResponseInterface;

use App\Libraries\ResultJson\Json as Json;

/* @Author GEOL <big9401@gmail.com>
 * @see 로그인 인증 관련 컨트롤러
 * */
class Auth extends Controller {

  public function index() {

  }

  /* @author GEOL <big9401@gmail.com>
   * @see 세션 테스트
   */
  public function createSession( $data ): array
  {
    $session = Services::session();
    $mySession = array(
      'name' => $data[0]->{'NAME'},
      'grade' => $data[0]->{'GRADE'}
    );
    $session->set($mySession);

    return $mySession;
  }

  /* @author GEOL <big9401@gmail.com>
   * @see 세션 테스트
   */
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

  /* @author GEOL <big9401@gmail.com>
   * @see 세션 테스트
   */
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

  /* @author GEOL <big9401@gmail.com>
   * @see 로그인 뷰 띄우기
   */
  public function login() {
//    $this->createSession();
//    $this->response->redirect('/');

    echo view('header');
    echo view('auth/login');
  }

  /* @author GEOL <big9401@gmail.com>
   * @see 세션 테스트, 로그아웃
   */
  public function logout() {
    $this->destroySession();
    $this->response->redirect('/');
  }

  /* @author GEOL <big9401@gmail.com>
   * @return bool | string
   * @see 로그인 처리
   */
  public function loginProc()
  {
    $id = $this->request->getPost('id');
    $pwd = $this->request->getPost('password');
    $hash_pwd = hash('sha512', $pwd);

    $UM = new UserModel();
    $data = $UM->where('ID', $id)->where('PWD', $hash_pwd)->get();
    $result = $data->getResultObject();

    $json = new Json();
    if ( $result ) {
      $session = $this->createSession($result);
      return $json->success();
    } else {
      return $json->fail();
    }
  }

  /* @author GEOL <big9401@gmail.com>
   * @throws \ReflectionException
   * @see 회원가입 처리
   */
  public function register(): ResponseInterface
  {
    $id = $this->request->getPost("id");
    $mail = $this->request->getPost("mail");
    $password = $this->request->getPost("password");
    $name = $this->request->getPost("name");

    $password_hash = hash("sha512", $password);

    $data = array(
      "ID" => $id,
      "MAIL" => $mail,
      "PWD" => $password_hash,
      "NAME" => $name,
      "GRADE" => "guest"
    );

    $UM = new UserModel();
    $UM->insert($data);

    return $this->response->redirect('/');
  }
}