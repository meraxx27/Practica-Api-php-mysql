<?php

class Conectar {
    
    protected $dbh;
    // Método para realizar la conexión a la base de datos
    protected function Conexion(){
        try{
            // Conexión usando PDO
            $connectar=$this->dbh=new PDO("mysql:local=localhost;dbname=php-api", "root", "");
            return $connectar;

        } catch (Exception $e){
            print "Error DB:".$e->getMessage()."<br/>";

            die();
        }
    }
    public function set_name(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
    
}


?>