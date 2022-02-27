<?php
namespace Project\Controllers;

use Project\Users\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo $this->getTemplate('login.php');
    }
}