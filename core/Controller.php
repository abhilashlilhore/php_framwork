<?php 

namespace app\core;


Class Controller{


    public string $layout='main';

    public function setLayout($layout){

        $this->layout=$layout;

    }

    public function render($view, $data=[]){

        return Application::$app->router->renderView($view,$data);
    }
}