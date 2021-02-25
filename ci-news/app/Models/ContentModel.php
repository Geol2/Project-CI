<?php
namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model {
    public function __construct() {
        /* 헬퍼 로드
         * vendor\CodeIgniter4\system\helpers\date_helper.php
         * "_help" 를 제외하고 helper('date').
         * 많은 기능이 'vendor\CodeIgniter4\system\I18n' 모듈로 이동됨.
         */
        helper('date');
    }

    public function setModelContentUpload($params) {
        $subject = $params['sub'];
        $content = $params['content'];
        $writer = $params['writer'];

        $unix = now('Asia/Seoul'); // 현재시간 : UNIX 타임 스탬프
        $now = date("Y-m-d H:i:s", $unix);

//         Github : fzaninotto\Faker Provider 참고
//         $date = new \DateTime('now');
//         $date->setTimezone(new \DateTimeZone('Asia/Seoul'));
//         $now = $date->format("Y-m-d H:i:s");

        /*
         * This DataBase Query :
         * INSERT INTO USER ('SUBJECT_NAME', 'CONTENT', 'WRITER', 'DATE_CHAR' VALUES ($count, $subject, $content, $writer, $new);
         */
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set("SUBJECT_NAME", $subject);
        $builder->set("CONTENT", $content);
        $builder->set("WRITER", $writer);
        $builder->set("DATE_CHAR", $now);
        $builder->where("user");
        $builder->insert();
        $db->close();
    }

    public function getModelContentDownload() {
        $db = \Config\Database::connect();
        /* SELECT * FROM USER */
        $builder = $db->table('USER');
        $query = $builder->get();

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

        $db->close();
        return $result;
    }
}
