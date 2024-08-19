<?php
session_start();
require_once 'App/Core/helper.php';
require_once 'vendor/autoload.php';

if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'].'/';
}else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'].'/';
}

define('ROOT_URL',$web_root);



// use App\Controllers\BaseController;
// use App\Controllers\HomeController;
use App\Core\Route;

// // new BaseController();

// // new HomeController();

new Route;
// use App\Models\User;

// $userModel = new User();
// var_dump($userModel->getOneUser(2));
// $category=new Category();
// var_dump($category->deleteCategory(1));