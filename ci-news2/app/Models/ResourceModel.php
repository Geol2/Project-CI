<?php
namespace App\Models;

use CodeIgniter\Model as Model;

class ResourceModel extends Model {
    protected $now;
    protected $db;

    public function __construct() {
        /* 헬퍼 로드
         * vendor\CodeIgniter4\system\helpers\date_helper.php
         * "_help" 를 제외하고 helper('date').
         * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
         */
        helper('date');
        $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
        $this->now = date("Y-m-d H:i:s", $unix); // UNIX 타임스탬프를 년/월/일 시간:분:초 로 변경.

        $this->db = $this->dbconn();
    }

    function dbconn(): \CodeIgniter\Database\BaseConnection
    {
        $this->db = \Config\Database::connect();
        return $this->db;
    }

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

    function getListUser() {
        /* DATABASE QUERY :
         * SELECT * FROM USER WHERE $sno, $date_char
         * */
        $builder = $this->db->table('USER');
        $query = $builder->get(); // *

        $sno = array();
        $sub = array();
        $content = array();
        $writer = array();
        $date = array();
        foreach( $query->getResult('array') as $row ) {
            array_push($sno, $row['SNO']);
            array_push($sub, $row['SUBJECT_NAME']);
            array_push($content, $row['CONTENT']);
            array_push($writer, $row['WRITER']);
            array_push($date, $row['DATE_CHAR']);
        }

        $result = array(
            'SNO' => $sno,
            'SUBJECT_NAME' => $sub,
            'CONTENT' => $content,
            'WRITER' => $writer,
            'DATE_CHAR' => $date
        );
        $this->db->close();

        return $result;
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