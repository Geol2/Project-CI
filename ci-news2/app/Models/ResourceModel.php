<?php
namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model as Model;

class ResourceModel extends Model {
    protected $now;
    protected $db;

    protected $table = "user";
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

    function setDataUser($datas) {
        $subject = $datas['SUB'];
        $content = $datas['CONTENT'];
        $writer = $datas['WRITER'];

        $builder = $this->db->table('user');
        $builder->set("SUBJECT_NAME", $subject);
        $builder->set("CONTENT", $content);
        $builder->set("WRITER", $writer);
        $builder->set("DATE_CHAR", $this->now);
        $builder->where("user");
        $builder->insert();
        $this->db->close();
    }

    function getUser($sno_) {
        /* DATABASE QUERY :
         * SELECT * FROM USER WHERE SNO=$sno_
         * */
        $builder = $this->db->table('USER');
        $builder->get(); // *
        $builder->where('SNO', $sno_);

        $data = $builder->get()->getResultArray();

        $this->db->close();

        return $data;
    }

    function getPaging($total) {
        $pageSize = 5;
        $totalCount = $total;
        $startPage = 1;
    }

    function getUserCount() {
        $builder = $this->db->table('USER');
        $builder->selectCount('SNO');

        $data = $builder->get()->getResultArray();

        $count = $data[0]['SNO'];
        // $q = $this->db->getLastQuery();

        $this->db->close();
        return $count;
    }

    function getListUser() {
        /* DATABASE QUERY :
         * SELECT * FROM USER WHERE $sno, $date_char
         * */
        $builder = $this->db->table('USER');
        $builder->limit(3);

        // $query = $builder->get();
        $data['list'] = $builder->get()->getResultArray();

        return $data;
    }

    function udtDataUser($sno = null, $data = null) {

        /*  DATABASE QUERY :
         *  UPDATE USER INTO SET ($data) WHERE ($param);
         * */
        $builder = $this->db->table('user');
        $builder->where('SNO', $sno);
        $builder->replace($data);
        $this->db->close();
    }

    function rmvDataUser($sno = null) {
        /*
         *  DELETE FROM USER WHERE SNO = $sno;
         */
        $builder = $this->db->table("user");
        $builder->delete(['SNO' => $sno]);
        $this->db->close();
    }
}