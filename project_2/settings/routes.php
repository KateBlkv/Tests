<?php

return [
    [
        'path' => '/',
        'method' => 'GET',
        'controller' => 'Project\Controllers\IndexController::index'
    ],
    [
        'path' => '/toForm',
        'method' => 'GET',
        'controller' => 'Project\Controllers\UserController::showLinkForm'
    ],
    [
        'path' => '/cutLink',
        'method' => 'POST',
        'controller' => 'Project\Controllers\LinkController::showCutLink'
    ],
    [
        'path' => '/useLink',
        'method' => 'POST',
        'controller' => 'Project\Controllers\LinkController::useCutLink'
    ]
];