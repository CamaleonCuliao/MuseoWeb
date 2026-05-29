<?php
require __DIR__ . '/../../models/public/publicModel.php';

class detallesMuseoController{
    function showIndex() {
        require __DIR__ . '/../../config/helpers.php';

        if(empty($_GET['tablename']) || is_numeric($_GET['tablename'])) {
            echo "<script type='module'> import { errorNombreTabla } from '".BASE_URL."scripts/alerts.js'; errorNombreTabla() </script>";
            exit();   
        }

        $m = new publicModel($_GET["tablename"]);

        if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "<script type='module'> import { errorId } from '".BASE_URL."scripts/alerts.js'; errorId() </script>";
            exit();   
        }

        $comprobacion = $m->getOne($_GET["id"]);

        try {
            $comprobacion->execute();
        } catch(PDOException $e){
            if(empty($_GET['tablename']) || is_numeric($_GET['tablename'])) {
                echo "<script type='module'> import { errorNombreTabla } from '".BASE_URL."scripts/alerts.js'; errorNombreTabla() </script>";
                exit();   
            }
        }

        if($comprobacion->fetch(PDO::FETCH_ASSOC) == false) {
            echo "<script type='module'> import { errorId } from '".BASE_URL."scripts/alerts.js'; errorId() </script>";
            exit();
        }
        
        $stm = $m->getOne($_GET["id"]);

        $db = new DB();
        
        $exposiciones = $m->get('exposiciones');
        $exposiciones->execute();

        $visitas = $m->get('visitas_guiadas');
        $visitas->execute();

        $monumentos = $m->get('monumentos');
        $monumentos->execute();

        $yacimientos = $m->get('yacimientos');
        $yacimientos->execute();

        $reseñas = $m->getReseñas($_GET["id"]);
        $reseñas->execute();

        $fetch = $m->esFavorito();
        $fetch->execute();
        $favorito = $fetch->fetch(PDO::FETCH_ASSOC);

        $stm->execute();

        require __DIR__ . '/../../view/public/detallesMuseo.php';
    }

    function añadirFavorito(){
        require __DIR__ . '/../../config/helpers.php';

        $m = new publicModel($_GET["tablename"]);
        $m->añadirFavorito();

        require __DIR__ . '/../../view/public/detallesMuseo.php';
    }

    function eliminarFavorito(){
        require __DIR__ . '/../../config/helpers.php';

        $m = new publicModel($_GET["tablename"]);
        $m->eliminarFavorito();

        require __DIR__ . '/../../view/public/detallesMuseo.php';
    }

    function publicarResenna(){
        require __DIR__ . '/../../config/helpers.php';

        $m = new publicModel($_GET["tablename"]);
        $m->publicarResenna();

        require __DIR__ . '/../../view/public/detallesMuseo.php';
    }

    function comprarEntrada(){
        require __DIR__ . '/../../config/helpers.php';

        $usuario = json_decode($_COOKIE['auth'], true);

        $id_museo = $_GET['id'];
        $id_usuario = $usuario['id'];
        $id_pago = $_POST['metodo_pago'];

        if(isset($_POST['reducido'])) {
            $reducido = 1;
        } else {
            $reducido = 0;
        }

        $cantidad = $_POST['cantidad'];

        $datos = array(
            "id_museo" => $id_museo,
            "id_usuario" => $id_usuario,
            "id_pago" => $id_pago,
            "reducido" => $reducido,
            "cantidad" => $cantidad
        );

        $m = new publicModel($_GET["tablename"]);
        $m->comprarEntrada($datos);

        generarPDFEntrada($datos);

        //fix
        echo "<script> window.location.href = 'router.php?controller=detallesMuseo&method=showIndex&id={$_GET['id']}&tablename=museo'; </script>";
    }
}
