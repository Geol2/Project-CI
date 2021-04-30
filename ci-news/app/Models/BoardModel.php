<?php
namespace App\Models;

use CodeIgniter\Model as Model;

/* @author GEOL <big9401@gmail.com>
 * @see BoardModel 게시판 데이터베이스 정의
 */
class BoardModel extends Model {
  protected string $table = "board";
  protected string $primaryKey= "SNO";

  protected bool $useAutoIncrement = true;

  protected array $allowedFields = ['SNO', 'SUBJECT_NAME', 'CONTENT', 'WRITER', 'DATE_CHAR', 'HIT', 'created_at', 'updated_at'];
  protected array $validationRules    = [];
  protected array $validationMessages = [];
  protected bool $skipValidation     = false;
}