<?php
namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model {
    protected $db; // DB 커넥션
    protected $now; // 시간 저장
    
    public function __construct() {
        /* 헬퍼 로드
         * vendor\CodeIgniter4\system\helpers\date_helper.php
         * "_help" 를 제외하고 helper('date').
         * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
         */
        helper('date');
        $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
        $this->now = date("Y-m-d H:i:s", $unix); // UNIX 타임스탬프를 년/월/일 시간:분:초 로 변경.
        
        /* DB 커넥션.
         * DB Connection
         * */
        $this->db = \Config\Database::connect();
    }

    public function setModelContentUpload1($params) {
        $subject = $params['sub'];
        $content = $params['content'];
        $writer = $params['writer'];

//         Github : fzaninotto\Faker Provider 참고
//         $date = new \DateTime('now');
//         $date->setTimezone(new \DateTimeZone('Asia/Seoul'));
//         $now = $date->format("Y-m-d H:i:s");

        /*
         * This DataBase Query :
         * INSERT INTO USER ('SUBJECT_NAME', 'CONTENT', 'WRITER', 'DATE_CHAR' VALUES ($count, $subject, $content, $writer, $new);
         */
        $builder = $this->db->table('user');
        $builder->set("SUBJECT_NAME", $subject);
        $builder->set("CONTENT", $content);
        $builder->set("WRITER", $writer);
        $builder->set("DATE_CHAR", $this->now);
        $builder->where("user");
        $builder->insert();
        $this->db->close();
    }

    public function setModelContentUpload2($param, $data) {
        //echo $param;
        $sno = array();

        $data['DATE_CHAR'] = $this->now;

        /*  DATABASE QUERY :
         *  SELECT DATE_CHAR FROM USER WHERE SNO=$param;
         * */
        // $builder = $this->db->table('user');
        // $builder->getWhere(['SNO', $param], $data['DATE_CHAR']);

        /*  DATABASE QUERY :
         *  UPDATE USER INTO SET ($data) WHERE ($param);
         * */
        $builder = $this->db->table('user');
        $builder->where('SNO', $param);
        $builder->update($data);
        $this->db->close();
    }

    public function getModelContentDownload() {
        /* DATABASE QUERY :
         * SELECT * FROM USER
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

    public function delModelData($data) {
        /*
         *  DELETE FROM USER WHERE SNO = $data;
         */
        $builder = $this->db->table("user");
        $builder->delete(['SNO' => $data]);
        $this->db->close();
    }
}