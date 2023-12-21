<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\User;

class AuthController {

    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function showLoginForm() {
        if (!isset($_SESSION['user_id'])) {
            require_once 'resources/Views/login.php';
        }else{
            header("Location:".Helper::getBaseUrl().'/');
            exit();
        }
    }
    public function login() {
        $errors=[];
        if($_POST){
            $data['username'] = Helper::sanitize($_POST['username']);
            $data['password'] = Helper::sanitize($_POST['password']);

            if (empty($data['username'])) {
                $errors['user_required']  = 'Username is required';
            }else{
                $user = $this->userModel->findUserByName($data['username']);
                if(!$user){
                    $errors['user_not_found']  = 'Username not found';
                }else{
                    if(empty($data['password'])){
                        $errors['pass_required']  = 'password is required';
                    }else{
                       if(!password_verify($data['password'],$user['password'])){
                           $errors['pass_verify']  = 'password not verify';
                       }
                    }
                }
            }

            if(empty($errors)){
                session_start();
                $_SESSION['user_id']  = $user['id']; // Replace with the actual user ID
                $_SESSION['username'] = $user['username'];
                print_r($_SESSION);
                header("Location:".Helper::getBaseUrl().'/');
                exit();
            }else{
                require_once 'resources/Views/login.php';
            }

        }else{
           require_once 'resources/Views/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location:".Helper::getBaseUrl().'/');
        exit();
    }

}
?>
