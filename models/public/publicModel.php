<?php
require __DIR__ . "/../model.php";

class publicModel extends model{
    function __construct($table_name){
        $this->conn = new DB;
        $this->table_name = $table_name;
    }

    public function yaExiste(){
        $sql = "SELECT * FROM auth WHERE email = '".$_POST['email']."' AND contrasenna = '".$_POST["contrasenna"]."'";
        
        $stm = $this->conn->openConn()->prepare($sql);
        
        try{
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e){
            echo $e;
        }
    }

    /* FUNCIONES DE CUENTA*/

    public function registerAuth(){

        $sql = "INSERT INTO `auth`(`nombre`, `email`, `contrasenna`, `activo`, `id_roles`) VALUES ('$_POST[nombre]','$_POST[email]','$_POST[contrasenna]',1,1)";

        $stmt= $this->conn->openConn()->prepare($sql);

        try{
            $stmt->execute();

            $this->registerUsuario();
        } catch(PDOException $e){
            echo $e;
        }
    }

    public function registerUsuario(){
        $sql = "INSERT INTO `usuarios`( `id_auth`, `nombre`, `descripcion`, `imagen_perfil`) VALUES (".$this->getLast()['id'].",'".$this->getLast()['nombre']."','','default.jpg')";

        $stmt= $this->conn->openConn()->prepare($sql);

        $stmt->execute();
    }

    public function publicarResenna(){
        $sql = "INSERT INTO `post`( `id_usuario`, `id_museo`, `cuerpo`, `rating`, `titulo`) VALUES ($_POST[id_usuario],'$_POST[id_museo]','$_POST[cuerpo]','$_POST[rating]', '$_POST[titulo]')";

        $stmt= $this->conn->openConn()->prepare($sql);

        try{
            $stmt->execute();
            echo "<script>window.location.href='router.php?controller=detallesMuseo&method=showIndex&id=$_POST[id_museo]&tablename=museo';</script>";
        } catch(PDOException $e){
            echo $e;
        }
    }

    public function editUsuario($id){
        $ejemplo = $this->buildArray();

        foreach($ejemplo as $x => $y){
            echo "".$x." == ".$y."";
        }
    }

    public function getFavoritos() {
        $usuario = json_decode($_COOKIE['auth'], true);

        $sql = "SELECT museo.* FROM museo
                INNER JOIN museo_usuario
                ON museo.id = museo_usuario.id_museo
                WHERE museo_usuario.id_usuario = '$usuario[id]'";

        return $stm = $this->conn->openConn()->prepare($sql);
    }

    public function esFavorito(){
        $museo = $_GET["id"];
        $usuario = json_decode($_COOKIE['auth'], true);

        $sql = "SELECT * FROM `museo_usuario` WHERE id_museo = '$museo' AND id_usuario = '$usuario[id]'";

        return $stm = $this->conn->openConn()->prepare($sql);
    }

    public function eliminarFavorito(){
        $museo = $_GET["id"];
        $usuario = json_decode($_COOKIE['auth'], true);

        $sql = "DELETE FROM `museo_usuario` WHERE id_museo = '$museo' AND id_usuario = '$usuario[id]'";

        $stm = $this->conn->openConn()->prepare($sql);

        try{
            $stm->execute();
            echo "<script>window.location.href='router.php?controller=detallesMuseo&method=showIndex&id=$_GET[id]&tablename=museo';</script>";
        } catch(PDOException $e){
            echo $e;
        }
    }

    public function añadirFavorito() {
        $museo = $_GET["id"];
        $usuario = json_decode($_COOKIE['auth'], true);

        $sql = "INSERT INTO `museo_usuario`(`id_museo`, `id_usuario`) VALUES ('$museo','$usuario[id]')";

        $stm = $this->conn->openConn()->prepare($sql);

        try{
            $stm->execute();
            echo "<script>window.location.href='router.php?controller=detallesMuseo&method=showIndex&id=$_GET[id]&tablename=museo';</script>";
        } catch(PDOException $e){
            echo $e;
        }
    }

    /* FUNCIONES DE NAVEGACION */

    public function selectFiltrado($provincias, $tabla, $busqueda){
        if(isset($provincias)){
            if($tabla == 'museo'){
                $sql = "SELECT * FROM $tabla WHERE id_provincia = " . implode(" OR id_provincia =" , $provincias) 
                        . " AND (:busqueda = '' OR nombre LIKE CONCAT('%', :busqueda, '%'))";
            } else{
                $sql = "SELECT $tabla.* FROM $tabla 
                        INNER JOIN museo 
                        ON $tabla.id_museo = museo.id
                        WHERE museo.id_provincia = " . implode(" OR museo.id_provincia =" , $provincias)
                        . " AND (:busqueda = '' OR $tabla.nombre LIKE CONCAT('%', :busqueda, '%'))";
            }
        } else{
            if($tabla == 'museo'){
                $sql = "SELECT * FROM $tabla WHERE" 
                        . " :busqueda = '' OR nombre LIKE CONCAT('%', :busqueda, '%')";
            } else{
                $sql = "SELECT $tabla.* FROM $tabla 
                        INNER JOIN museo 
                        ON $tabla.id_museo = museo.id"
                        . " WHERE :busqueda = '' OR $tabla.nombre LIKE CONCAT('%', :busqueda, '%')";
            }
        }

        $stm = $this->conn->openConn()->prepare($sql);
        $stm->bindValue(':busqueda', $busqueda);
        $stm->execute();
        return $stm;
    }

    public function filtrado($filtro){
        $tabla = $filtro['tipo'];

        $provincias = $filtro['provincias'];

        $busqueda = $filtro['busqueda'];

        try{
            if($tabla == 'todo'){                
                $museos = $this->selectFiltrado($provincias, 'museo', $busqueda)->fetchAll(PDO::FETCH_ASSOC);

                foreach($museos as &$m){
                    $m['tabla'] = 'museo';
                }

                $monumentos = $this->selectFiltrado($provincias, 'monumentos', $busqueda)->fetchAll(PDO::FETCH_ASSOC);

                foreach($monumentos as &$m){
                    $m['tabla'] = 'monumentos';
                }

                $exposiciones = $this->selectFiltrado($provincias, 'exposiciones', $busqueda)->fetchAll(PDO::FETCH_ASSOC);

                foreach($exposiciones as &$m){
                    $m['tabla'] = 'exposiciones';
                }

                $visitas = $this->selectFiltrado($provincias, 'visitas_guiadas', $busqueda)->fetchAll(PDO::FETCH_ASSOC);

                foreach($visitas as &$m){
                    $m['tabla'] = 'visitas_guiadas';
                }

                return array_merge($museos, $monumentos, $exposiciones, $visitas);
            } else{
                return $this->selectFiltrado($provincias, $tabla, $busqueda)->fetchAll(PDO::FETCH_ASSOC);;
            }
        } catch(PDOException $e){
            echo $e;
        }

    }

    public function getReseñas($id){
        $sql = "SELECT post.titulo, post.cuerpo, post.rating, usuarios.nombre, usuarios.imagen_perfil
                FROM post
                INNER JOIN usuarios
                ON post.id_usuario = usuarios.id_auth
                WHERE post.id_museo = $id";

        $stm = $this->conn->openConn()->prepare($sql);

        return $stm;
    }

    /* METODOS DE ENTRADAS*/

    function comprarEntrada($datos){

        $sql = "INSERT INTO `detalles_pago`(`id_museo`, `id_usuario`, `id_metodo_pago`, `reducido`, `cantidad`) VALUES ('$datos[id_museo]','$datos[id_usuario]','$datos[id_pago]', '$datos[reducido]', '$datos[cantidad]')";

        try {
            $stmt= $this->conn->openConn()->prepare($sql);

            $stmt->execute();
        } catch(PDOException $e){
            echo $e;
        }

    }
}