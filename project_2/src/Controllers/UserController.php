<?php

namespace Project\Controllers;

use Project\Users\Controller;

class UserController extends Controller
{
        public function showLinkForm()
    {
        echo $this->getTemplate('getShortLink.php');
    }

}
