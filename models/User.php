<?php

namespace app\models;

use app\core\DbModel;


class User extends DbModel
{


    const STATUS_ACTIVE=1;
    const STATUS_INACTIVE=0;
    const STATUS_DELETE=2;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmpassword = '';
    public int $status=self::STATUS_INACTIVE;


    public function tableName():string
    {
        return 'users';
    }



    public function save()
    {

        $this->status=self::STATUS_ACTIVE;
        $this->password= password_hash($this->password,PASSWORD_DEFAULT);

        return parent::save();

    
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL , [self::RULE_UNIQUE, 'class'=>self::class, 'attrbute' => 'email']],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 8]],
            'confirmpassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
            
        ];
    }

    public function attributes() : array {

        return ['firstname','lastname','email','password','status'];
        
    }

   
}
