<?php

// Define routes
$routes = array(
    '/'                 => 'HomeController@index',
    '/home'             => 'HomeController@index',
    '/article/index'    => 'ArticleController@index',
    '/article/detail'   => 'ArticleController@show',
    '/login'            => 'AuthController@showLoginForm',
    '/login/process'    => 'AuthController@login',
);

if(isset($_SESSION['user_id'])){
    $routes['/article/user']   = 'ArticleController@userArticles';
    $routes['/article/create'] = 'ArticleController@create';
    $routes['/comment/delete'] = 'CommentController@delete';
    $routes['/comment/add']    = 'CommentController@add';
    $routes['/comment/edit']   = 'CommentController@edit';
    $routes['/logout']   = 'AuthController@logout';
}
?>
