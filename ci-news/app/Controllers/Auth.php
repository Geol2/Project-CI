<?php namespace App\Controllers;


use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {
  protected $userModel;

  function __construct() {
    $this->userModel = new UserModel();
  }

  public function index() {

  }

  public function login() {
    echo 'Hello Auth login()';
    
  }
}