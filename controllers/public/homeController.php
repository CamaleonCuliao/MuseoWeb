<?php
require __DIR__ . '/../../models/public/publicModel.php';

class homeController {
    function showIndex() {
        require __DIR__ . '/../../config/helpers.php';

        $db = new DB();

        $m = new publicModel('');
        
        $alicante = $m->get('museo');
        $alicante->execute();

        $murcia = $m->get('museo');
        $murcia->execute();

        $exposiciones = $m->get('exposiciones');
        $exposiciones->execute();

        $visitas = $m->get('visitas_guiadas');
        $visitas->execute();

        $monumentos = $m->get('monumentos');
        $monumentos->execute();

        $yacimientos = $m->get('yacimientos');
        $yacimientos->execute();

        require __DIR__ . '/../../view/public/home.php';
    }
}
