<?php 

namespace app\core\form;

// use app\core\Model;

Class Form{


    public function __construct()
    {
        
    }

    public static function formStart($action , $method){

        echo sprintf('<form action"%s" method="%s">',$action, $method);

        return new Form();
    }

    public static function formEnd(){
        echo '</form>';
    }

    public function field($model,$attribute){

        return new Field($model, $attribute);

    }

    
}