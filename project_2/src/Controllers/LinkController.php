<?php

namespace Project\controllers;

use Project\Users\Controller;
use Project\Db\LinkDb;

class LinkController extends Controller
{
    private $linkDb;

    public function __construct(){
        $this->linkDb = new LinkDb();
    }

    private function randomName($length = 6) {
        static $randStr = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $name = '';
        for($i=0; $i<$length; $i++) {
            $key = rand(0, strlen($randStr)-1);
            $name .= $randStr[$key];
        }
        return $name;
    }

    private function cutLink(){
        do {
            $length = rand(5, 7);
            $shortLink = $this->randomName($length);
        } while ($this->linkDb->getLongLink($shortLink) === null);
        return $shortLink;
    }


    public function showCutLink(){
        $post = $_POST;
        $longLink = trim($post['longLink']);
        if (!$this->linkDb->getShortLink($longLink)){
            $sortLink = $this->cutLink();
            $this->linkDb->addNewLongShortLink($longLink, $sortLink);
            $data = $this->linkDb->getAll($longLink);
        }
        $data = $this->linkDb->getAll($longLink);
        echo $this->getTemplate('userLink.php', $data);
    }

    public function useCutLink(){
        $server = $_SERVER;
        $time = $server['REQUEST_TIME'];
        $ip = $server['REMOTE_ADDR'];
        $agent = $server['HTTP_USER_AGENT'];
        $post = $_POST;
        $shortLink = $post['shortLink'];
        $longLink = $this->linkDb->getLongLink($shortLink);
        $this->linkDb->addUserInformation($shortLink, $ip, $time, $agent);
        header('Location:' . $longLink);
    }
}