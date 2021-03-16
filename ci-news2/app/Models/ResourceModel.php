<?php
namespace App\Models;

use CodeIgniter\Model as Model;

class ResourceModel extends Model {
  protected $now;
  protected $db;

  protected $table = "board";
  protected $primaryKey= "SNO";

  protected $useAutoIncrement = true;
  protected $returnType = 'array';

  protected $allowedFields = ['SNO', 'SUBJECT_NAME', 'COTNENT', 'WRITER', 'DATE_CHAR'];


  public function __construct() {
    /* 헬퍼 로드
    * vendor\CodeIgniter4\system\helpers\date_helper.php
    * "_help" 를 제외하고 helper('date').
    * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
    */
    helper('date');
    $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
    $this->now = date("Y-m-d H:i:s", $unix); // UNIX 타임스탬프를 년/월/일 시간:분:초 로 변경.

    $this->db = db_connect();
  }
  //
  //    function dbconn(): BaseConnection
  //    {
  //        $this->db = \Config\Database::connect();
  //        return $this->db;
  //    }

  function setDataBoard($datas) {
    $subject = $datas['SUB'];
    $content = $datas['CONTENT'];
    $writer = $datas['WRITER'];

    $builder = $this->db->table('board');
    $builder->set("SUBJECT_NAME", $subject);
    $builder->set("CONTENT", $content);
    $builder->set("WRITER", $writer);
    $builder->set("DATE_CHAR", $this->now);
    $builder->set("HIT", 0);
    $builder->where("board");
    $builder->insert();
    $this->db->close();
  }

  function getBoard($sno_): array
  {
    /* DATABASE QUERY :
    * SELECT * FROM USER WHERE SNO=$sno_
    * */
    $builder = $this->db->table('board');
    $builder->get(); // *
    $builder->where('SNO', $sno_);

    $data = $builder->get()->getResultArray();

    $this->db->close();

    return $data;
  }

  function setContentPaging($getPage = null, $pageSize = null): array
  {

    if( isset($getPage) == false) {
      return array(
        "first" => 1,
        "last" => $pageSize
      );
    }

    $firstContent = ($getPage - 1) * $pageSize + 1;
    $lastContent = $getPage * $pageSize;

    return array(
      "first" => $firstContent,
      "last" => $lastContent
    );
  }

  function getBoardCount() {
    $builder = $this->db->table('board');
    $builder->selectCount('SNO');

    $data = $builder->get()->getResultArray();

    $count = $data[0]['SNO'];
    // $q = $this->db->getLastQuery();

    $this->db->close();
    return $count;
  }

  function getListBoard($setContentPaging = null, $pageSize): array
  {
    /* DATABASE QUERY :
    * SELECT * FROM board WHERE $sno
    * */

    $builder = $this->db->table('board');
    $builder->limit( $pageSize, $setContentPaging['last'] - $pageSize);

    // $query = $builder->get();
    $data['list'] = $builder->get()->getResultArray();
    return $data;
  }

  function udtDataBoard($sno = null, $data = null) {
    /*  DATABASE QUERY :
    *  UPDATE board INTO SET ($data) WHERE ($param);
    * */
    $builder = $this->db->table('board');
    $builder->where('SNO', $sno);
    $builder->replace($data);
    $this->db->close();
  }

  function rmvDataBoard($sno = null) {
    /*
    *  DELETE FROM board WHERE SNO = $sno;
    */
    $builder = $this->db->table("board");
    $builder->delete(['SNO' => $sno]);
    $this->db->close();
  }

  function hitContent( $hit, $sno ) {
    /*
     * UPDATE `board` SET hit = hit + 1 where `sno` = $sno
     */
    $data = [
      'HIT' => $hit + 1
    ];

    $builder = $this->db->table("board");
    $builder->where('SNO', $sno);
    $builder->update($data);

    return $data['HIT'];
  }
}