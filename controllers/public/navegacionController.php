<?php
require __DIR__ . '/../../models/public/publicModel.php';

class navegacionController {
    function showIndex() {
        require __DIR__ . '/../../config/helpers.php';

        //Recoge los datos de filtrado, que pueden mandarse por formulario  (navegacion.php linea 56) o por los links de paginacion (navegacion.php linea 106)
        $filtro = array(
            'tipo' => $_POST['tipo'] ?? $_GET['tablename'],
            'provincias' => $_POST['provincias'] ?? $_GET['provincias'] ?? null,
            'busqueda' => $_POST['busqueda'] ?? $_GET['busqueda'] ?? '',
        );

        $generar = $_GET['pdf'] ?? '';

        $offset = $_GET['offset'] ?? 0;

        $m = new publicModel($filtro['tipo']);
        $informacion = $m->filtrado($filtro);

        $m = new publicModel($filtro['tipo']);
        $datosPDF = $m->filtrado($filtro);

        if($generar ==  'yes'){
            generarPDFNavegacion($datosPDF);
        }

        require __DIR__ . '/../../view/public/navegacion.php';
    }
}
