<?php
namespace App\Models;
class Comment {

    public $pageSize = 3;



    public function getArticleComments(int $id):array
    {
        $sql = "SELECT `comments`.* ,`users`.username  FROM `comments` INNER JOIN `users` ON (`users`.`id` = `comments`.`user_id`)  Where `comments`.`article_id` = :id ";
        $params =[':id'=>$id];
        $result = $GLOBALS['db']->query($sql, $params);
        $comments   =   $GLOBALS['db']->fetchall($result);
        return $comments;
    }

    public function create(array $data) {
        $sql    = "INSERT INTO `comments` (`text`, `article_id`, `user_id`) VALUES (:text,:article_id,:user_id)";
        $params = [':text' => $data['text'],':article_id' => $data['article_id'],':user_id' => $_SESSION['user_id']];
        $GLOBALS['db']->query($sql, $params);
    }

    public function update(array $data) {
        $sql    = "UPDATE `comments` SET `text`=:text WHERE `id` =:id";
        $params = [':id' => $data['id'],':text' => $data['text']];
        $GLOBALS['db']->query($sql, $params);
    }

    public function delete(int $id) {
        $sql    = "DELETE FROM comments WHERE`id` =:id";
        $params = [':id' => $id];
       return $GLOBALS['db']->query($sql, $params);
    }



}
?>