<?php

namespace Project\Db;

namespace Project\Db;

use Project\Users\DBConnection;
use PDO;

class LinkDb
{
    private $connection;
    public function __construct(){
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    public function getShortLink($longLink)
    {
        $sql = "SELECT short_link FROM tb_links WHERE long_link = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$longLink]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

        public function getLongLink($shortLink)
    {
        $sql = "SELECT long_link FROM tb_links WHERE short_link = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$shortLink]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewLongShortLink($long, $short)
    {
        $sql = "INSERT INTO tb_links(long_link, short_link) VALUE (:l_param, :s_param);";
        $params = [
            'l_param' => $long,
            's_param' => $short
        ];
        $statement = $this->connection->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($longLink)
    {
        $sql = "SELECT * FROM tb_links WHERE long_link = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$longLink]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUserInformation($shortLink, $ip, $data, $agent){
        $string = "'" . $shortLink . "'";
        $sql = "UPDATE tb_links 
                SET ip = :ip_param, 
                    data_time = :d_param, 
                    user_agent = :u_param
                WHERE short_link = $string;";
        $params = [
            'ip_param' => $ip,
            'd_param' => $data,
            'u_param' => $agent
        ];
        $statement = $this->connection->prepare($sql);
        return $statement->execute($params);
    }
}