<?php


function renderizarTablasHelper($stm)
{
    $length = $stm->columnCount();

    echo '<div class="d-flex justify-content-between align-items-center mb-3">';
    echo   '<h1 class="h3 mb-0">Listado de ' . htmlspecialchars($_GET["tablename"]) . '</h1>';
    echo   '<a href="router.php?controller=user&section=admin&method=showInsert&tablename=' . urlencode($_GET["tablename"]) . '" class="btn"><i class="bi bi-plus-lg me-1"></i>Nuevo registro</a>';
    echo '</div>';

    echo '<div class="table-responsive">';
    echo '<table class="table table-dark table-dark-custom table-hover table-bordered align-middle">';
    echo '<thead><tr>';
    for ($i = 0; $i < $length; $i++) {
        echo '<th>' . htmlspecialchars($stm->getColumnMeta($i)['name']) . '</th>';
    }
    echo '<th>Editar</th>';
    echo '<th>Borrar</th>';
    echo '</tr></thead>';
    echo '<tbody>';
    while ($row = $stm->fetch()) {
        echo '<tr>';
        for ($i = 0; $i < $length; $i++) {
            $id = $row[0];
            echo '<td>' . htmlspecialchars($row[$i]) . '</td>';
        }
        $table = urlencode($_GET["tablename"]);
        echo '<td><a href="router.php?controller=user&section=admin&method=showEdit&tablename=' . $table . '&id=' . $id . '" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-fill"></i></a></td>';
        echo '<td><a href="router.php?controller=user&section=admin&method=deleteview&tablename=' . $table . '&id=' . $id . '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'¿Eliminar este registro?\')"><i class="bi bi-trash-fill"></i></a></td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

function renderizarInsertHelper($stm)
{
    $length = $stm->columnCount();
    $table = htmlspecialchars($_GET['tablename']);

    echo '<div class="row justify-content-center">';
    echo '<div class="col-12 col-md-8 col-lg-6">';
    echo '<div class="card bg-dark border-secondary">';
    echo '<div class="card-header border-secondary"><h4 class="mb-0 text-white">Nuevo registro — ' . $table . '</h4></div>';
    echo '<div class="card-body">';
    echo '<form action="router.php?controller=user&section=admin&method=createview&tablename=' . urlencode($_GET['tablename']) . '" method="post">';

    for ($i = 1; $i < $length; $i++) {
        $name = htmlspecialchars($stm->getColumnMeta($i)['name']);
        echo '<div class="mb-3">';
        echo '<label class="form-label text-white">' . $name . '</label>';
        echo '<input type="text" class="form-control" name="' . $name . '">';
        echo '</div>';
    }

    echo '<div class="d-flex gap-2 mt-4">';
    echo '<button type="submit" class="btn btn-danger flex-fill"><i class="bi bi-save me-1"></i>Crear</button>';
    echo '<a href="router.php?controller=user&method=showIndex&tablename=' . urlencode($_GET['tablename']) . '" class="btn btn-outline-secondary flex-fill">Cancelar</a>';
    echo '</div>';
    echo '</form>';
    echo '</div></div></div></div>';
}

function renderizarEditHelper($stm)
{
    $length = $stm->columnCount();
    $table = htmlspecialchars($_GET['tablename']);

    echo '<div class="row justify-content-center">';
    echo '<div class="col-12 col-md-8 col-lg-6">';
    echo '<div class="card bg-dark border-secondary">';
    echo '<div class="card-header border-secondary"><h4 class="mb-0 text-white">Editar registro — ' . $table . '</h4></div>';
    echo '<div class="card-body">';
    echo '<form action="router.php?controller=user&section=admin&method=editview&tablename=' . urlencode($_GET['tablename']) . '&id=' . urlencode($_GET['id']) . '" method="post">';

    for ($i = 1; $i < $length; $i++) {
        $name = htmlspecialchars($stm->getColumnMeta($i)['name']);
        echo '<div class="mb-3">';
        echo '<label class="form-label">' . $name . '</label>';
        echo '<input type="text" class="form-control" name="' . $name . '">';
        echo '</div>';
    }

    echo '<div class="d-flex gap-2 mt-4">';
    echo '<button type="submit" class="btn btn-warning flex-fill"><i class="bi bi-pencil me-1"></i>Guardar</button>';
    echo '<a href="router.php?controller=user&method=showIndex&tablename=' . urlencode($_GET['tablename']) . '&id=' . urlencode($_GET['id']) . '" class="btn btn-outline-secondary flex-fill">Cancelar</a>';
    echo '</div>';
    echo '</form>';
    echo '</div></div></div></div>';
}

function renderizarDeleteHelper()
{
    $table = htmlspecialchars($_GET['tablename']);

    echo '<div class="row justify-content-center">';
    echo '<div class="col-12 col-md-6 col-lg-4">';
    echo '<div class="card bg-dark border-danger">';
    echo '<div class="card-header border-danger text-danger"><h4 class="mb-0"><i class="bi bi-exclamation-triangle-fill me-2"></i>Eliminar registro</h4></div>';
    echo '<div class="card-body">';
    echo '<form action="router.php?controller=user&method=deleteview&tablename=' . urlencode($_GET['tablename']) . '" method="post">';
    echo '<div class="mb-3">';
    echo '<label class="form-label">ID del registro</label>';
    echo '<input type="number" class="form-control" name="id_usuario" placeholder="Introduce el ID">';
    echo '</div>';
    echo '<div class="d-flex gap-2 mt-4">';
    echo '<button type="submit" class="btn btn-danger flex-fill"><i class="bi bi-trash me-1"></i>Eliminar</button>';
    echo '<a href="router.php?controller=user&method=showIndex&tablename=' . urlencode($_GET['tablename']) . '" class="btn btn-outline-secondary flex-fill">Cancelar</a>';
    echo '</div>';
    echo '</form>';
    echo '</div></div></div></div>';
}

function renderizarCaja($imagen, $titulo, $id, $table_name)
{
    if ($table_name == 'museo') {
        $href = 'router.php?controller=detallesMuseo&method=showIndex&id=' . $id . '&tablename=' . $table_name;
        //echo "<a id=test href='router.php?controller=detallesMuseo&method=showIndex&id=$id&tablename=$table_name'> a</a>";
    } else {
        $href = 'router.php?controller=detallesGeneral&method=showIndex&id=' . $id . '&tablename=' . $table_name;
        //echo "<a id=test href='router.php?controller=detallesGeneral&method=showIndex&id=$id&tablename=$table_name'> a</a>";
    }

    echo "<a for='test' href=$href style=\"
            background: url('" . BASE_URL . "img/$imagen') no-repeat;
            background-size: cover;
            background-position: center;
        \"
        class='caja swiper-slide'>
        <h1 for='test'>$titulo</h1>
        ";
    echo  "</a>";
}

function renderizarCajaNavegacion($imagen, $titulo, $id, $table_name)
{
    if ($table_name == 'museo') {
        echo "<a id=test href='router.php?controller=detallesMuseo&method=showIndex&id=$id&tablename=$table_name'>";
    } else {
        echo "<a id=test href='router.php?controller=detallesGeneral&method=showIndex&id=$id&tablename=$table_name'>";
    }
    echo "<div style=\"
            background: url('" . BASE_URL . "img/$imagen') no-repeat;
            background-size: cover;
            background-position: center;
            for = test;
        \"
        class='caja'>
        <h1>$titulo</h1>
        ";
    echo  "</div> </a>";
}

function generarPDF($datos)
{
    ob_start();
    require(__DIR__ . '/../public/fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pageWidth  = $pdf->GetPageWidth() - 20;
    $colKey     = $pageWidth * 0.4;  // columna "campo"
    $colVal     = $pageWidth * 0.6;  // columna "valor"
    $lineHeight = 8;

    // --- TÍTULO ---
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFillColor(52, 73, 94);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 12, 'Ficha de Pago', 1, 1, 'C', true);  // 0 = ancho completo
    $pdf->Ln(5); // pequeño espacio tras el título

    // Encabezado
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetFillColor(52, 73, 94);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell($colKey, $lineHeight, 'Campo',  1, 0, 'C', true);
    $pdf->Cell($colVal, $lineHeight, 'Valor',  1, 1, 'C', true);

    // Filas
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    foreach ($datos as $clave => $valor) {
        $pdf->SetFillColor(240, 240, 240);
        $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', $clave)), 1, 0, 'L', true);
        $pdf->Cell($colVal, $lineHeight, $valor, 1, 1, 'L');
    }

    $pdf->Output('ficha.pdf', 'D');
}

function generarPDFEntrada($datos)
{
    $cantidad = $datos['cantidad'];
    $metodo_pago = $datos['id_pago'];
    $reducido = $datos['reducido'];

    if($metodo_pago == 1){
        $precio = 6.5;
    } else{
        $precio = 30;
    }

    $precio *= $datos['cantidad'];

    if($reducido == 1){
        $red = 'si';
        $precio /= 2;
    } else {
        $red = 'no';
    }

    ob_start();
    require(__DIR__ . '/../public/fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pageWidth  = $pdf->GetPageWidth() - 20;
    $colKey     = $pageWidth * 0.5;  // columna "campo"
    $colVal     = $pageWidth * 0.5;  // columna "valor"
    $lineHeight = 8;

    // --- TÍTULO ---
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFillColor(52, 73, 94);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 12, 'Ficha de Pago', 1, 1, 'C', true);  // 0 = ancho completo
    $pdf->Ln(5); // pequeño espacio tras el título

    // Encabezado
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetFillColor(52, 73, 94);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell($colKey, $lineHeight, 'Campo',  1, 0, 'C', true);
    $pdf->Cell($colVal, $lineHeight, 'Valor',  1, 1, 'C', true);

    // Filas
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', 'Precio')), 1, 0, 'L', true);
    $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', $precio)), 1, 1, 'L', true);

    $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', 'Reducido')), 1, 0, 'L', true);
    $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', $red)), 1, 1, 'L', true);

    $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', 'Id del museo')), 1, 0, 'L', true);
    $pdf->Cell($colKey, $lineHeight, ucfirst(str_replace('_', ' ', $datos['id_museo'])), 1, 1, 'L', true);

    $pdf->Output('ficha.pdf', 'D');
}


function generarPDFNavegacion($asociativo)
{

    ob_start();
    require(__DIR__ . '/../public/fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage('O');

    $llaves = array_keys($asociativo[0]);
    $total = count(array_keys($asociativo[0]));

    $pageWidth  = $pdf->GetPageWidth();
    $colKey     = $pageWidth / $total;  // columna "campo"
    $colVal     = $pageWidth / $total;  // columna "valor"
    $lineHeight = 8;

    // --- TÍTULO ---
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFillColor(52, 73, 94);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 12, 'Ficha de Pago', 1, 1, 'C', true);  // 0 = ancho completo
    $pdf->Ln(5); // pequeño espacio tras el título

    // Encabezado
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetFillColor(52, 73, 94);
    $pdf->SetTextColor(255, 255, 255);
    foreach ($llaves as $x) {
        $pdf->Cell($colKey, $lineHeight, $x,  1, 0, 'C', true); 
    }
    
    $pdf->Cell($colVal, $lineHeight, 'Valor',  1, 1, 'C', true);

    // Filas
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    foreach ($asociativo as $x) {
        $llaves_x = array_values($x);
        $lastKey = count($llaves_x) - 1;

        foreach($llaves_x as $i => $y) {
            $ln = ($i === $lastKey) ? 1 : 0;

            // Truncar si el texto supera el ancho de la celda
            $padding = 2; // margen interno aproximado de FPDF
            $maxWidth = $colVal - $padding;
            if ($pdf->GetStringWidth($y) > $maxWidth && strlen($y) > 0) {
                while ($pdf->GetStringWidth($y . '...') > $maxWidth && strlen($y) > 0) {
                    $y = substr($y, 0, -1);
                }
                $y = $y . '...';
            }

            $pdf->Cell($colVal, $lineHeight, $y, 1, $ln, 'L');
        }
    }

    $pdf->Output('ficha.pdf', 'D');
}
