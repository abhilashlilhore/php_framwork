<?php 


namespace app\core;



Class Database{


    public \PDO $pdo;


    public function __construct($config=[])
    {
      
        $dsn=$config['dsn'];
        $username=$config['username'];
        $password=$config['password'];
        $this->pdo= new \PDO($dsn,$username,$password);

        $this->pdo=setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}