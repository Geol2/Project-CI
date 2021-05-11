<?php namespace App\Libraries\SessionLib;

use Config\Services as Services;

interface interfaceSession {
  public function createSession($data) : array;
  public function checkSession($data);
  public function destroySession();

}

abstract class SessionAbstract implements interfaceSession {
    abstract public function createSession($data): array;
    abstract public function checkSession($data);
    abstract public function destroySession();
}

class Session extends SessionAbstract
{
  /* @author GEOL <big9401@gmail.com>
   * @see 세션 테스트
   */
  public function createSession($data): array
  {
    // TODO: Implement createSession() method.
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
  public function checkSession($data)
  {
    // TODO: Implement checkSession() method.
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
  public function destroySession()
  {
    // TODO: Implement destroySession() method.
    $session = Services::session();
    if( $session->has('name') ) {
      $session->destroy();
      echo '</br>';
      echo 'session destroy';
    } else {
      echo 'error here';
    }
  }
}