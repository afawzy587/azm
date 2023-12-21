<?php
namespace App\Controllers;
use App\Helpers\Helper;
use App\Models\Article;
use App\Models\Comment;

class ArticleController
{
    private $articleModel;
    private $commentModel;


    public function __construct()
    {
        $this->articleModel = new Article();
        $this->commentModel = new Comment();
    }

    public function userArticles()
    {
        if (isset($_SESSION['user_id'])) {
            $page = 1;
            if ($_GET) {
                $page = intval($_GET['page']);
            }
            $articles = $this->articleModel->userArticles($page);;
            $total    = $this->articleModel->userAll();
            $pageSize = $this->articleModel->pageSize;
            include('resources/Views/home.php');
        }else{
            header("Location:".Helper::getBaseUrl().'/');
            exit();
        }
    }

    public function show()
    {
        if($_GET){
            $id     =  intval($_GET['id']);
            $article = $this->articleModel->show($id);
            $comments = $this->commentModel->getArticleComments($id);
            include ('resources/Views/article_details.php');
        }else{
            include ('resources/Views/not_found.php');
        }

    }

    public function create()
    {
        if($_POST) {
            $data['title']   = Helper::sanitize($_POST['title']);
            $data['content'] = $_POST['content'];
            $data['user_id'] = $_SESSION['user_id'];

            // Get the file details


            if (empty($data['title'])) {
                $errors['title_required']  = 'title is required';
            }

            if (empty($data['content'])) {
                $errors['content_required']  = 'content is required';
            }

            if ($_FILES["img"]["name"] = "") {
                $errors['img_required']  = 'img is required';
            }
            if( $_FILES && ( $_FILES['img']['full_path'] != "") && ( $_FILES['img']['tmp_name'] != "" ) )
            {
                $uploadDir = './uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $uploadPath = $uploadDir.time() . '_' . basename($_FILES["img"]["full_path"]);
                move_uploaded_file($_FILES["img"]["tmp_name"], $uploadPath);
                $data['img'] = $uploadPath;
            }

            if(empty($errors)) {
                $this->articleModel->create($data);
                header("Location:".Helper::getBaseUrl().'/article/user');
                exit();
            }
        }

        include ('resources/Views/article_create.php');
    }

}