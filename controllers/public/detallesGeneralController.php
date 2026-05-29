<?php
require __DIR__ . '/../../models/public/publicModel.php';

class detallesGeneralController {
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
        
        $museos = $m->get('museo');
        $museos->execute();

        $stm->execute();

        require __DIR__ . '/../../view/public/detallesGeneral.php';
    }
}
