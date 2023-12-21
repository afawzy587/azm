<?php
namespace App\Models;
class Article {

    public $pageSize = 3;

    public function index(int $page)
    {
        $offset = $page == 0 ? 1 : ($page - 1) * $this->pageSize;
        $sql = "SELECT `articles`.* ,`users`.username  FROM `articles` INNER JOIN `users` ON (`users`.`id` = `articles`.`user_id`)LIMIT :offset, :pageSize";
        $params = [
            ':offset'   => (int)$offset,
            ':pageSize' => (int)$this->pageSize,
        ];
        $result = $GLOBALS['db']->query($sql, $params);
        $articles   =   $GLOBALS['db']->fetchAll($result);
        return $articles;
    }
    public function show(int $id):array
    {
        $sql = "SELECT `articles`.* ,`users`.username  FROM `articles` INNER JOIN `users` ON (`users`.`id` = `articles`.`user_id`) Where `articles`.`id` = :id ";
        $params =[':id'=>$id];
        $result = $GLOBALS['db']->query($sql, $params);
        $article   =   $GLOBALS['db']->fetch($result);
        return $article;
    }
    public function create(array $data) {
        $sql    = "INSERT INTO `articles`(`title`, `img`, `content`, `user_id`) VALUES (:title,:img,:content,:user_id)";
        $params = [":title"=>$data['title'], ":img"=>$data['img'],":content"=>$data['content'],":user_id"=>$data['user_id']];
       return $GLOBALS['db']->query($sql, $params);
    }
    public function userArticles(int $page) {
        $offset = $page == 0 ? 1 : ($page - 1) * $this->pageSize;
        $sql = "SELECT `articles`.* ,`users`.username  FROM `articles` INNER JOIN `users` ON (`users`.`id` = `articles`.`user_id`) WHERE `user_id` = :user_id LIMIT :offset, :pageSize";
        $params = [
            ':user_id'   => $_SESSION['user_id'],
            ':offset'   => (int)$offset,
            ':pageSize' => (int)$this->pageSize,
        ];
        $result = $GLOBALS['db']->query($sql, $params);
        $articles   =   $GLOBALS['db']->fetchAll($result);
        return $articles;
    }

    public function all():int
    {
        $sql = "SELECT COUNT(*) AS count FROM `articles`";

        $result = $GLOBALS['db']->query($sql);
        $data   = $GLOBALS['db']->fetch($result);
        return $data['count'];
    }
    public function userAll ():int
    {
        $sql = "SELECT COUNT(*) AS count FROM `articles`  WHERE `user_id` = :user_id";
        $params = [
            ':user_id'   => $_SESSION['user_id'],
        ];
        $result = $GLOBALS['db']->query($sql, $params);
        $data   = $GLOBALS['db']->fetch($result);
        return $data['count'];
    }

}
?>