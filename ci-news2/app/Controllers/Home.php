<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller {
    function index() {
        return view('/home');
    }
}