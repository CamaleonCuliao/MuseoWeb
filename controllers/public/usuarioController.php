<?php
require __DIR__ . '/../../models/public/publicModel.php';

class usuarioController {

    public $nombre;
    public $rol;

    function __construct() {
        $userinfo = json_decode($_COOKIE['auth'], true) ?? '';

        $this->nombre = $userinfo['nombre'] ?? '';
        $this->rol = $userinfo['rol'] ?? '';
    }

    function publicarResenna(){
        require __DIR__ . '/../../config/helpers.php';

        $m = new publicModel($_GET["tablename"]);
        $m->publicarResenna();

        require __DIR__ . '/../../view/public/detallesMuseo.php';
    }
}