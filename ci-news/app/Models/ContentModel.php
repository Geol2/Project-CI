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

//         fzaninotto\Faker : Github 참고
//         Provider
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
        $query = $db->query("SELECT * FROM USER");
        $row = $query->getRow();
        $db->close();

        return $row;
    }
}
