<?php

namespace app\models;

use app\core\Model;

class RegisterModels extends Model
{



    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmpassword = '';



    public function register()
    {

        echo 'createing user';
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 8]],
            'confirmpassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

   
}
