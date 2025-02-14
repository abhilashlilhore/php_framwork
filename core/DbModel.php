<?php
namespace app\core;



abstract Class DbModel extends Model
{

    abstract function tableName():string;
    abstract function attributes():array;


    public function save(){

        $tableName=$this->tableName();
        $attributes=$this->attributes();

        $values= array_map(fn($val)=>":$val",$attributes);

        $statement =self::prepare( "INSERT INTO $tableName (".implode(',',$attributes).") VALUES (".implode(',',$values).")");

        foreach($attributes as $attr){

            $statement->bindValue(":$attr",$this->{$attr});
        }
        $statement->execute();

        return true;
   

    }

    public static function prepare($sql){

        return Application::$app->db->pdo->prepare($sql);
    }


}