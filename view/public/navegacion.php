<section class="padre_navegacion">
    <section class="navegacion">
        <h1>Museos y mas</h1>

        <?php 
            $tipo = $_POST['tipo'] ?? $_GET['tablename'];
            $provincias = $_POST['provincias'] ?? $_GET['provincias'] ?? null;
            $busqueda = $_POST['busqueda'] ?? $_GET['busqueda'] ?? '';
        ?>

        <form action=" <?php echo "router.php?controller=navegacion&method=showIndex&tablename=$filtro[tipo]&offset=0" ?>" method="post" class="filtros">
            <input name="busqueda" value="<?php echo $busqueda ?>" type="text" placeholder="Buscar por nombre" class="buscar">
            <label for="">Tipo</label>
            <select name="tipo" value="<?php echo $tipo ?>">
                <option value="todo" <?php if($tipo == 'todo'){echo 'selected';}?>>Todo</option>
                <option value="museo" <?php if($tipo == 'museo'){echo 'selected';}?>>Museos</option>
                <option value="exposiciones" <?php if($tipo == 'exposiciones'){echo 'selected';}?>>Exposiciones</option>
                <option value="monumentos" <?php if($tipo == 'monumentos'){echo 'selected';}?>>Monumentos</option>
                <option value="yacimientos" <?php if($tipo == 'yacimientos'){echo 'selected';}?>>Yacimientos</option>
                <option value="visitas_guiadas" <?php if($tipo == 'visitas_guiadas'){echo 'selected';}?>>Visitas guiadas</option>
            </select>

            </div>

            <label for="">Provincias</label>
            <div class="provincias">
                <label for="">Alicante</label>
                <input type="checkbox" name="provincias[]" value="1" 
                <?php 
                if(is_array($provincias)) {
                    foreach($provincias as $x) {
                        if($x == '1'){echo 'checked';}
                    }
                }
                ?>>

                <label for="">Murcia</label>
                <input type="checkbox" name="provincias[]" value="2" 
                <?php 
                if(is_array($provincias)) {
                    foreach($provincias as $x) {
                        if($x == '2'){echo 'checked';}
                    }
                }
                ?>>
            </div>

            <input type="submit" value="Filtrar">
        </form>

        <a href="<?php echo 'router.php?controller=navegacion&method=showIndex&tablename='.$filtro['tipo'].'&offset=0&pdf=yes'; ?>" > Generar un PDF </a>
    </section>

    <hr>

    <section class="renderizado">

        <?php
        if (count($informacion) == 0) {
            echo '<p> Busqueda no encontrada </p>';
        } else {
            if (count($informacion) > 8) {
                for ($i = $offset; $i < $offset + 8; $i++) {
                    if (isset($informacion[$i])) {
                        renderizarCajaNavegacion($informacion[$i]['imagen'], '',  $informacion[$i]['id'], $informacion[$i]['tabla'] ?? $filtro['tipo']);
                    }
                }
            } else {
                foreach ($informacion as $row) {
                    renderizarCajaNavegacion($row['imagen'], $row['nombre'],  $row['id'], $filtro['tipo']);
                }
            }
        }
        ?>

    </section>

    <section class="paginacion">
        <?php
        if (count($informacion) > 5) {
            $z = 0;
            for ($i = 0; $i < count($informacion) / 8; $i++) {
                echo "<a href=router.php?controller=navegacion&method=showIndex&tablename=$filtro[tipo]&offset=$z";
                if (isset($filtro['busqueda'])) {
                    echo "&busqueda=$filtro[busqueda]";
                };
                if (isset($filtro['provincias'])) {
                    foreach ($filtro['provincias'] as $p) {
                        echo "&provincias[]=$p";
                    }
                }
                echo ">" . $i + 1 . "</a>";
                $z += 5;
            }
        }
        ?>
    </section>
</section>