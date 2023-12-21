<?php
namespace App\models;
class User {

    public function create(array $data)
    {
        $sql    = "INSERT INTO `users` (`username`, `password`) VALUES (:username,:password)";
        $params = [":username" => $data['username'], ":password" =>$data['password']];
        $GLOBALS['db']->query($sql, $params);
    }


    public function findUserByName(string $username)
    {
        $sql    = "SELECT * FROM `users` WHERE `username` = :username";
        $params = [":username" => $username];
        $result = $GLOBALS['db']->query($sql, $params);
        $user   = $GLOBALS['db']->fetch($result);
        return $user;
    }

}
?>
