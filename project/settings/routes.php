<?php

return [
    [
        'path' => '/',
        'method' => 'GET',
        'controller' => 'Project\Controllers\IndexController::index'
    ],
    [
        'path' => '/allUsers',
        'method' => 'POST',
        'controller' => 'Project\Controllers\UserController::showAllUsers'
    ],
    [
        'path' => '/addUser',
        'method' => 'GET',
        'controller' => 'Project\Controllers\UserController::showAddUserForm'
    ],
    [
        'path' => '/success',
        'method' => 'POST',
        'controller' => 'Project\Controllers\UserController::showAllAfterAdding'
    ]
];