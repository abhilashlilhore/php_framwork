<?php

namespace app\core;



abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';


    public function loadData($data)
    {

        foreach ($data as $key => $value) {

            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    abstract  public function rules(): array;
    public array $errors = [];

    public function validate()
    {        

        foreach ($this->rules() as $attribute => $rules) {// 'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 8]],

            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = $rule;

                if (!is_string($ruleName)) {
                    // [self::RULE_MIN, 'min' => 4]
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {

                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                   
                    $this->addError($attribute, self::RULE_EMAIL);
                }

                if ($ruleName === self::RULE_MIN && strlen($value)< $rule['min'] ) {
                   
                    $this->addError($attribute, self::RULE_MIN,$rule );
                }

                if ($ruleName === self::RULE_MAX && strlen($value)> $rule['max'] ) {
                   
                    $this->addError($attribute, self::RULE_MAX,$rule );
                }

                if ($ruleName === self::RULE_MATCH && $value!== $this->{$rule['match']} ) {
                //    'confirmpassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
                    $this->addError($attribute, self::RULE_MATCH,$rule );
                }

                if ($ruleName === self::RULE_UNIQUE ) {

                    $className=$rule['class'];
                    $tableName=$className::tableName();
                    $uniqueAttribute=$rule['attrbute']??$attribute;

                    $statement=Application::$app->db->prepare(" SELECT * FROM $tableName where $uniqueAttribute= :attr ");

                    $statement->bindValue(':attr',$value);

                    $statement->execute();
                    $resultObject=$statement->fetchObject();
                    if($resultObject){
                        $this->addError($attribute, self::RULE_UNIQUE,['field'=>$attribute] );
                    }                 
                   
                    
                }


            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule, $params=[] )
    {

        $message = $this->errorMessage()[$rule] ?? '';

        foreach($params as $key=>$value){
            $message=str_replace("{{$key}}",$value,$message);
        }


        $this->errors[$attribute][] = $message;
    }

    public function errorMessage():array
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email',
            self::RULE_MIN => 'This field must be minimul length {min} ',
            self::RULE_MAX => 'This field max length {max} ',
            self::RULE_MATCH => 'This field confirm password not match with password',
            self::RULE_UNIQUE => 'Record with this {field} already exist',

        ];
    }

    public function hasError($attribute)
    {

        return  $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute){
        return $this->errors[$attribute][0]??'';
    }
}
