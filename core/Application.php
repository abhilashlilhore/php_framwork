<?php

/**
 * Auther: Abhilash
 * Content:Php framwork
 * Version:1.0
 *  Php-version:7.4
 * Compony:Savior.im
 * Date : 2/11/2025
 * @author Abhilash Lilhore <abhilashlilhore1729@gmail.com>
 * @package ${Simple php Framwork}
 * 
 */

namespace app\core;



class Application
{

    public static string $ROOT_DIR;
    public Router $router;
    public Responce $responce;
    public Request $request;
    public Database $db;

    public static Application $app;

    public Controller $controller;

    function __construct($rootDir, array $config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->request = new Request();
        $this->responce = new Responce();
        $this->router = new Router($this->request);
        $this->db= new Database($config['db']);
    }

    public function run()
    {

      echo     $this->router->resolve();
    }
}
