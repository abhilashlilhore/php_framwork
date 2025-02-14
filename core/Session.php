<?php
namespace app\core;


Class Session{

    protected const FLASH_KEY = "flash_message";


    public function __construct()
    {

        session_start();

        // $flashMessage=$_SESSION[self::FLASH_KEY] ?? [] ;

        // foreach($flashMessage as $key => &$flashMessage){

        //     $flashMessage['remove']=true;

        // }
        // $_SESSION[self::FLASH_KEY]=$flashMessage;
        

    }

    public function setFlash($key,$message){

        $_SESSION[self::FLASH_KEY][$key]=$message;

    }

    public function getFlashMessage($key){

          return $_SESSION[self::FLASH_KEY][$key]??false;      

    }
    public function unsetMessage($key){
        unset($_SESSION[self::FLASH_KEY][$key]);
    }

    public function __distruct(){

        // unset($_SESSION);

        // $flashMessage=$_SESSION[self::FLASH_KEY] ?? [] ;

        // foreach($flashMessage as $key=> &$flashMessage){

        //     if($flashMessage['remove']){
        //         unset($flashMessage[$key]);
        //     }

        // }
        // $_SESSION[self::FLASH_KEY]=$flashMessage;
    }
}