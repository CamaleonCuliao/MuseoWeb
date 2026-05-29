<?php 
require __DIR__ . '/../../models/public/publicModel.php';
class cuentaController {
    function showIndex() {
        require __DIR__ . '/../../config/helpers.php';
    
        $m = new publicModel('usuarios');
        $stm = $m->getCuenta($_SESSION["id"]);
        $stm->execute();
        $usuario = $stm->fetch(PDO::FETCH_ASSOC);

        $m = new publicModel('museo_usuario');
        $comprobar = $m->getFavoritos();
        $comprobar->execute();

        $m = new publicModel('museo_usuario');
        $favoritos = $m->getFavoritos();
        $favoritos->execute();

        require __DIR__ . '/../../view/public/cuenta.php';

    }

    function putCuenta(){
        $m = new publicModel('usuarios');

        $archivo = $_FILES['imagen_perfil'];

        // Carpeta destino (debe existir o crearla)
        $carpetaDestino = __DIR__ . "/../../public/img/users/";

        $rutaFinal = $carpetaDestino . $archivo['name'];

        // Mover el archivo
        if (move_uploaded_file($archivo['tmp_name'], $rutaFinal)) {

        } else {
            echo "Error al subir la imagen";
        }

        $m->editOne($_GET['id'], 'router.php?controller=cuenta&method=showIndex&id=$_GET[id]');
    }
}
