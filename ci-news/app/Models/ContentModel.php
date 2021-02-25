<?php
namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model {

    public function setContent($params) {
        $subject = $params['sub'];
        $content = $params['content'];
        $writer = $params['writer'];

        $date = new \DateTime('now');
        $date->setTimezone(new \DateTimeZone('Asia/Seoul'));
        $now = $date->format("Y-m-d H:i:s");


        /*
         * This Query string,
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

        return 0;
    }

    public function getContent($params) {

    }
}
