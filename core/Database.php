<?php


namespace app\core;



class Database
{


    public \PDO $pdo;


    public function __construct($config = [])
    {

        $dsn = $config['dsn'] ?? '';
        $username = $config['username'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }

    public function applyMigration()
    {

        $this->createMigrationTable();
        $getAppliedMigration = $this->getAppliedMigration();

        $newMigrations=[];

        $files = scandir(Application::$ROOT_DIR . '/migration'); //this is path and we are scaning this folder

        $toApplyMigration = array_diff($files, $getAppliedMigration);
        
        foreach($toApplyMigration as $key=>$migration){

            if($migration==='.'|| $migration === '..'){

                continue;
            }

            require_once Application::$ROOT_DIR . '/migration/'.$migration;

            $className= pathinfo($migration,PATHINFO_FILENAME);

            $instance=new $className();

            $this->log("Appling migration ". $migration);

            $instance->up();

            $this->log("Migration applied ". $migration);


            $newMigrations[]=$migration;
        }

        if(!empty($newMigrations)){

            $this->saveMigrations($newMigrations);
            
        }else{
            $this->log("All migrations are applied");
        }
    }
    public function createMigrationTable()
    {


        $this->pdo->exec("CREATE TABLE IF NOT EXISTS `mvc_framwork`.`migrations` ( `id` INT NOT NULL AUTO_INCREMENT , `migration` VARCHAR(255) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB");
    }

    public function getAppliedMigration()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }


    public function saveMigrations( array $migrations){
      

        $str_migrations=implode(',',array_map(fn($m)=>"('$m')",$migrations));

        $sql="INSERT INTO migrations (migration) VALUE $str_migrations ";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();


    }

    public function log($message){

        echo '['.date("M-D-Y H:i:s").']-'.$message.PHP_EOL;

    }
}
