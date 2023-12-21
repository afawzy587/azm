<?php

namespace App\Controllers;
use App\Models\Article;

class HomeController {
    private $articleModel;
    public function __construct()
    {
        $this->articleModel = new Article();
    }

    public function index() {
        $page=0;
            if ($_GET) {
                $page = intval($_GET['page']);
            }
            $articles = $this->articleModel->index($page);
            $total = $this->articleModel->all();
            $pageSize = $this->articleModel->pageSize;
            include('resources/Views/home.php');
    }
}
?>
