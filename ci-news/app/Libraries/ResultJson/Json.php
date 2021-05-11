<?php namespace App\Libraries\ResultJson;

/* @author GEOL <big9401@gmail.com>
 * @see json 인터페이스 정의
 */
interface JsonInterface {
  public function success();
  public function fail();
}

/* @author GEOL <big9401@gmail.com>
 * @see json 추상 클래스 정의
 */
abstract class JsonAbstract implements JsonInterface {
  abstract public function success();
  abstract public function fail();
}

/* @author GEOL <big9401@gmail.com>
 * @see json 클래스
 */
class Json extends JsonAbstract {
  public function success() {
      // TODO: Implement success() method.
    $result = array(
      'code' => 200,
      'data' => 'success'
    );
    return json_encode($result, JSON_UNESCAPED_UNICODE);
  }

  public function fail() {
    // TODO: Implement fail() method.
    $result = array(
      'code' => 400,
      'data' => 'fail'
    );
    return json_encode($result, JSON_UNESCAPED_UNICODE);
  }
}