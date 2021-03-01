<?php
namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $db;

    protected $table = "user";
    protected $allowedFields = ['SNO', 'SUBJECT_NAME', 'COTNENT', 'WRITER', 'DATE_CHAR'];


    public function __construct() {
        $this->db = db_connect();
        $this->db->table('user');
        // $this->db->close();
    }

    public function getUsers($slug = false): array
    {
        if($slug === false) {
            return $this->findAll();
        }

    }
}
