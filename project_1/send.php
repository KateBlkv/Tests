<?php

$server = $_SERVER;

if (isset($_POST) && $server['REQUEST_METHOD'] === 'POST'){
    $post = $_POST;
    var_dump($post);
    $user_name = $post['name'];
    $message = htmlspecialchars($post['description']);
    $adminEmail = htmlspecialchars($post['adminEmail']);
    $user_email = htmlspecialchars($post['email']);
    $user_phone = htmlspecialchars($post['phone']);
}
$headers = "From: $user_name\r\n Reply-to: $user_email\r\n Phone number: $user_phone\r\nContent-Type: text/html; charset=utf-8\r\n";

if(mail($adminEmail, $message, $headers)) echo '1';

