<?php 
namespace app\core;

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

 Class Request{


    public function getPath(){

        $path=$_SERVER['REQUEST_URI']?? '/';

        $possition= strpos($path,'?');

        if($possition===false){
            return $path;
        }
        return substr($path,0,$possition);
        // echo '<pre>';
        // var_dump($possition);
        // echo '</pre>';

        
        
    }

    public function method(){

       return $method=strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){
        return $this->method()=='get';
    }

    public function isPost(){
        return $this->method()=='post';
    }
    
    public function getBody(){

        $body=[];

        if($this->method()==='get'){

            foreach($_GET as $key=>$value){

                $body[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
      
        if($this->method()==='post'){

            foreach($_POST as $key=>$value){

                
                $body[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

      



        return $body;

    }
 }
