<?php
require __DIR__ . "/../model.php";

class adminModel extends model{
    function __construct($table_name){
        $this->conn = new DB;
        $this->table_name = $table_name;
    }

    /* FUNCIONES DE ADMINISTRACION */

    protected function buildArray(){
        $sql = "DESCRIBE $this->table_name";

        $stm = $this->conn->openConn()->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        $modelKeys = array();
        $modelValues = array();

        foreach ($result as $row) {
            $modelKeys[] = $row["Field"];
            $modelValues[] = $_POST[$row['Field']] ?? null;
        }

        $userData = array_combine($modelKeys, $modelValues);

        return $userData;
    }

    public function insertOne($url){

        $userData = $this->buildArray();

        $columnas = implode(", ", array_keys($userData));
        $placeholders = ":" . implode(", :", array_keys($userData));

        $sql = "INSERT INTO $this->table_name ($columnas) VALUES ($placeholders)";

        $stmt= $this->conn->openConn()->prepare($sql);

        try{
            $stmt->execute($userData);
            echo "<script>window.location.href='$url';</script>";
        } catch(PDOException $e){
            echo $e;
            echo $sql;
        }

    }

    public function editOne($id, $url){

    $userData = $this->buildArray();

    $sql = "UPDATE $this->table_name SET ";

    $fields = array();

    $n = 0;

    foreach ($userData as $key => $value) {
        if ($key != "id" && $value != null) {
            $fields[] = "$key = '$value'";
            $n++;
        }
    }

    $sql .= implode(", ", $fields);

    if ($n != 0) {
        $sql .= " WHERE id = " . $id;

        echo $sql . "<br>";

        $stm = $this->conn->openConn()->prepare($sql);

        try {
            $stm->execute();
            echo "<script>window.location.href='$url';</script>";
        } catch(PDOException $e) {
            echo $e;
        }

    } else {
        echo "<script>window.location.href='$url';</script>";
        }
    }

    public function deleteOne($id, $url){
        $sql = "DELETE FROM $this->table_name WHERE id =" .$id;

        echo $sql;

        $stm = $this->conn->openConn()->prepare($sql);
        try{
            $stm->execute();
            echo "<script>window.location.href='$url';</script>";
        } catch (PDOException $e){
            echo $e;
        }
    }
}