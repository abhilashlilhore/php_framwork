<?php

namespace app\models;

use app\core\Model;

Class Login extends Model{


    public string $email='';
    public string $password='';

    public function __construct(){

    }

    public function rules():ARRAY {
       
        return $RULES= [
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED ],
        ];
    }


}