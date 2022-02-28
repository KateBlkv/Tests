<?php

$server = $_SERVER;

if (isset($_POST) && $server['REQUEST_METHOD'] === 'POST'){
    $post = $_POST;
    var_dump($post);
    $user_name = $post['name'];
    $message = htmlspecialchars(trim($post['description']));
    $adminEmail = htmlspecialchars(trim($post['adminEmail']));
    $user_email = htmlspecialchars(trim($post['email']));
    $user_phone = htmlspecialchars(trim($post['phone']));
}
$headers = "From: $user_name\r\n Reply-to: $user_email\r\n Phone number: $user_phone\r\nContent-Type: text/html; charset=utf-8\r\n";

mail($adminEmail, $message, $headers);

