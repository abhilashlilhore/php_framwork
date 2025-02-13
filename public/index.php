<?php  
/**
 * Auther: Abhilash
 * Content:Php framwork
 * Php-version:7.4
 * Version:1.0
 * Compony:Savior.im
 * Date : 2/11/2025
 * @author Abhilash Lilhore <abhilashlilhore1729@gmail.com>
 * @package ${Simple php Framwork}
 * 
 */

 require_once __DIR__."/../vendor/autoload.php";

use app\controller\AuthController;
use app\controller\SiteController;
use app\core\Application;

$app= new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class,'homeView']);
$app->router->get('/contact',[SiteController::class,'contactView']);
$app->router->post('/contact',[SiteController::class,'addContact']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);



$app->run();



