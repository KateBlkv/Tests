<?php
require_once '../vendor/autoload.php';

if (preg_match('/\.(css|js|gif|jpg|png|svg)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}


\Project\Users\Router::start();