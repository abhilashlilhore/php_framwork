<?php 



class m001_initial{



    public function up(){

        $db= \app\core\Application::$app->db;
        $sql="CREATE TABLE `mvc_framwork`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(255) NOT NULL , `lastname` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `status` BOOLEAN NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

        $db->pdo->exec($sql);
    }

    public function down(){

        $db= \app\core\Application::$app->db;
        $sql="DROP TABLE `mvc_framwork`.`users` ";
        $db->pdo->exec($sql);
    }
}