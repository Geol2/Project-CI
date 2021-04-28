<?php
namespace App\Models;

use CodeIgniter\Model as Model;

class BoardModel extends Model {
  protected string $table = "board";
  protected string $primaryKey= "SNO";

  protected bool $useAutoIncrement = true;
//  protected string $returnType = 'array';

  protected array $allowedFields = ['SNO', 'SUBJECT_NAME', 'CONTENT', 'WRITER', 'DATE_CHAR', 'HIT', 'created_at', 'updated_at'];
  protected array $validationRules    = [];
  protected array $validationMessages = [];
  protected bool $skipValidation     = false;
}