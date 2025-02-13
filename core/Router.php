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


class Router
{

    protected array $routes = [];
    public Request $request;///create variables
    public function __construct(Request $request)///request class comes from application
    {
        $this->request = $request;//initiate variables to use
    }


    ///create array of routes available
    public function get($path, $callback)
    {

        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
        // example if $app->router->post('/contact',function(){ return 'contact form'; });  
        // then->output  [post] => Array ( [/contact] => Closure Object ( ) )
    }


    /// get curresponding objects of route
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        //   echo '<pre>';
        //   print_r($this->routes);
        $callback = $this->routes[$method][$path] ?? false; //if $method = [post] and $path = [/contact] ) so then $callback is Closure Object ( )

        if ($callback === false) {
            Application::$app->responce->setStatusCode(404);

            return $this->renderContent('_404','');
        }
        ///we asuming this is view only
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        /// we have arry with first class name with path and function name 
        if(is_array($callback)){
            // create object(instance) from class name. initialy it is just a stiring like "app/controller/SiteController"
        Application::$app->controller= $callback[0]=new $callback[0]();
        }

      
       return call_user_func($callback , $this->request);
    }


    // insert content in layout
    public function renderView($view,$data=[])////pass data from controller to view
    {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderViewOnly($view,$data);

        return str_replace('{{content}}', $viewContent, $layoutContent);

        //require_once Application::$ROOT_DIR."/view/$view.php";
    }


    // load main layout 
    protected function layoutContent()
    {

        $layout=Application::$app->controller->layout;
        ob_start();
        require_once Application::$ROOT_DIR . "/view/layouts/$layout.php";
        return ob_get_clean();
    }


    // load page content from view 
    protected function renderViewOnly($view,$data)
    {
        foreach($data as $key=>$value ){
            $$key = $value;
        }

        ob_start();
        require_once Application::$ROOT_DIR . "/view/$view.php";
        return ob_get_clean();
    }


    ////404 page view load 
    protected function renderContent($view,$data)
    {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderViewOnly($view,$data);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
}
