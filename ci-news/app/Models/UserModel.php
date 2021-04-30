<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
  protected string $table = "users";
  protected string $primaryKey = "SNO";

  protected array $allowedFields = ['SNO', 'ID', 'PWD', 'NAME', 'MAIL', 'CREATED_AT', 'UPDATED_AT'];
  protected string $returnType =  "string";

}
