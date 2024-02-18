<?php
session_start();
require_once 'App/Core/helper.php';
require_once 'vendor/autoload.php';
define("ROOT_URL", "http://127.0.0.1:8000/");

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