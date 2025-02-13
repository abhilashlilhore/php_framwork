<?php

namespace app\core;

Class Responce{


    public function __construct()
    {
        
    }


    public function setStatusCode(int $code){

        http_response_code($code);

    }
}