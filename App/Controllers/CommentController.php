<?php
namespace App\Controllers;
use App\Helpers\Helper;
use App\Models\Article;
use App\Models\Comment;

class CommentController
{
    private $commentModel;
    public function __construct()
    {
        $this->commentModel = new Comment();
    }
    public function delete()
    {
        if($_POST){
            $this->commentModel->delete(intval($_POST['id']));
            $response = array('success' => true);
        }else{
            $response = array('success' => false, 'message' => 'Failed to delete item');
        }

        echo json_encode($response);

    }

    public function add()
    {
        if($_POST){
            $data['article_id']  = intval($_POST['article_id']);
            $data['text']        = Helper::sanitize($_POST['text']);
            $data['user_id']     = $_SESSION['user_id'];
            $this->commentModel->create($data);
            $response = array('success' => true);
        }else{
            $response = array('success' => false, 'message' => 'can not add comment');
        }

        echo json_encode($response);

    }

    public function edit()
    {
        if($_POST){
            $data['id']  = intval($_POST['id']);
            $data['text']        = Helper::sanitize($_POST['text']);
            $this->commentModel->update($data);
            $response = array('success' => true);
        }else{
            $response = array('success' => false, 'message' => 'can not add comment');
        }

        echo json_encode($response);

    }
}