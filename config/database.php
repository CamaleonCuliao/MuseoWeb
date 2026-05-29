<?php
class DB {

    //Datos necesarios para acceder a la DB
    private $host = "localhost";
    private $db = "museoweb";
    private $user = "root";
    private $pass = "";
    
   

    //Abrir conexion
    public function openConn(){
        try{
            $dbc = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);

            return $dbc;
        }catch(PDOException $e){
            echo $e;
        }
        
    }

    //Cerrar conexion
    public function closeConn($dbc){
        $dbc = null;
    }

    //Devuelve el sql con todos los datos de una tabla
    function selectAll($tableName){
        $stm = $this->openConn()->query("SELECT * FROM ".$tableName);

        return $stm;
    }
}