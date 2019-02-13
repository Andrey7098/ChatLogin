<?php

class Db{
    public static function getConnection(){
        try{
        $db = new PDO('mysql:host=localhost;dbname=testproject','root','');
        return $db;
        }catch(PDOExection $e){
            echo $e->getMessage();
        }
    }
}

?>