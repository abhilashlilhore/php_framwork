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

use app\controller\AuthController;
use app\controller\SiteController;
use app\core\Application;

require_once __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Application(__DIR__, $config);



$app->db->applyMigration();
