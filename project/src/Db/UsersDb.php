<?php

namespace Project\Db;



class UsersDb
{
    public function getAllUsers()
    {
        $info = file('dataBase.txt');
        $users = [];
        foreach ($info as $item){
            $users[]=explode(' ',$item);
        }
        return $users;
    }
    public function addNewUser()
    {
        $post = $_POST;
        $name = $post['name'];
        $surname = $post['surname'];
        $age = $post['age'];
        $login = $post['login'];
        $pwd = $post['pwd'];
        $info = file_get_contents('dataBase.txt');
        $info .= "\n" . $name . ' ' . $surname . ' ' . $age . ' ' . $login . ' ' . $pwd;
        file_put_contents('dataBase.txt',$info);
    }
}