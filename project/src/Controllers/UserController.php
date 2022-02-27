<?php

namespace Project\Controllers;

use Project\Db\UsersDb;
use Project\Users\Controller;

class UserController extends Controller
{
    private $usersDb;

    public function __construct(){
        $this->usersDb = new UsersDb();
    }

    private function isAdmin()
    {
        $post = $_POST;
        $login = $post['login'];
        $pwd = $post['pwd'];
        if ($login === 'Admin' && $pwd === 'admin'){
            return 1;
        } else return 0;
    }

    private function allUsersData()
    {
        $users = $this->usersDb->getAllUsers();
        $data = [
            'users' => $users
        ];
        echo $this->getTemplate('allUsers.php', $data);
    }

    public function showAllUsers()
    {
        if ($this->isAdmin()){
            $this->allUsersData();
        } else echo $this->getTemplate('422.php');
    }

    public function showAddUserForm()
    {
        echo $this->getTemplate('addNewUser.php');
    }

    public function showAllAfterAdding()
    {
        $this->usersDb->addNewUser();
        $this->allUsersData();
    }
}
