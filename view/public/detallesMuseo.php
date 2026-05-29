
<script>
$(function() {
    // Configuración de ambos popups
    $("#popup, #popupResenna").dialog({
        autoOpen: false,
        show: { effect: "fold", duration: 1000 },
        hide: { effect: "fold", duration: 1000 }
    });

    // Botón que abre #popup
    $("#opener").on("click", function() {
        if ($("#popupResenna").dialog("isOpen")) {
            $("#popupResenna").dialog("close");
        }
        $("#popup").dialog("open");
    });

    // Botón que abre #popupResenna
    $("#openerResena").on("click", function() {
        if ($("#popup").dialog("isOpen")) {
            $("#popup").dialog("close");
        }
        $("#popupResenna").dialog("open");
    });
});
</script>

<main>
    <section class="informacion_museo">
        <?php 
        $museo = $stm->fetch(PDO::FETCH_ASSOC);
        echo "
        <div class='cabeza_museo uno'>
        <img src='".BASE_URL."img/".$museo['imagen']."'>
        <h1>".$museo['nombre']."</h1>";
        if (isset($_SESSION["rol"])) {
            if($favorito == false){
                echo "<a href='router.php?controller=detallesMuseo&method=añadirFavorito&id=$_GET[id]&tablename=$_GET[tablename]'> Favorito </a>";
            } else {
                echo "<a href='router.php?controller=detallesMuseo&method=eliminarFavorito&id=$_GET[id]&tablename=$_GET[tablename]'> Quitar de favorito </a>";
            }
        }
        echo "<p>".$museo['descripcion']."</p>
        <p>".$museo['descripcion_larga']." Descripcion larga</p>
        </div>

        <div class='museo_exposiciones dos'>
            <h4>Exposiciones</h4>";
            $i = 0;
            while($row = $exposiciones->fetch(PDO::FETCH_ASSOC)){
                if($row["id_museo"] == $museo["id"]){
                    echo "<a href = 'router.php?controller=detallesGeneral&method=showIndex&id=$row[id]&tablename=exposiciones'>". $row["nombre"] ." </a>";
                    $i++;
                }
            }
            if($i == 0){
                echo "<p> Este museo no tiene monumentos asociados</p>";
            }
        
        echo "</div>";

        $i = 0;
        echo" <div class='museo_exposiciones tres'> <h4>Visitas</h4> ";
            while($row = $visitas->fetch(PDO::FETCH_ASSOC)){
                if($row["id_museo"] == $museo["id"]){
                    echo "<a href = 'router.php?controller=detallesGeneral&method=showIndex&id=$row[id]&tablename=visitas_guiadas'>". $row["nombre"] ." </a>";
                    $i++;
                }
            }
            if($i == 0){
                echo "<p> Este museo no tiene visitas asociados</p>";
            }
        echo " </div>";

        echo" <div class='museo_exposiciones cuatro'> <h4>Monumentos</h4> ";
        $i = 0;
        while($row = $monumentos->fetch(PDO::FETCH_ASSOC)){
            if($row["id_museo"] == $museo["id"]){
                echo "<a href = 'router.php?controller=detallesGeneral&method=showIndex&id=$row[id]&tablename=monumentos'>". $row["nombre"] ." </a>";
                $i++;
            }
        }
        if($i == 0){
            echo "<p> Este museo no tiene monumentos asociados</p>";
        }
        echo " </div>";


        echo" <div class='museo_exposiciones cinco'> <h4>Yacimientos</h4> ";
        $i = 0;
        while($row = $monumentos->fetch(PDO::FETCH_ASSOC)){
            if($row["id_museo"] == $museo["id"]){
                echo "<a href = 'router.php?controller=detallesGeneral&method=showIndex&id=$row[id]&tablename=yacimientos'>". $row["nombre"] ." </a>";
                $i++;
            }
        }
        if($i == 0){
            echo "<p> Este museo no tiene yacimientos asociados</p>";
        }
        echo " </div>";

echo "<div class='seis'>
    <h4>Localización</h4>
    <iframe src='" . htmlspecialchars($museo['mapa'], ENT_QUOTES, 'UTF-8') . "' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
</div>";

        echo '</section>';

        echo "<div class='comprar'>";
        if(is_null($museo['id_pago']) || $museo['id_pago'] == 2) {
            echo '<p> La entrada es gratuita </p>';
        } else {
            if (isset($_SESSION["rol"])) {
                echo '<button id="opener">Comprar ticket</button>';
            } else {
                echo '<a href=router.php?controller=auth&method=showLogin> <button>Inicia sesion para comprar tickets</button> </a>';
            }
        }
        echo '</div>';
        
        ?>
    <hr>

    <section class="review">
        <div class="publicar">
        <h1>Reseñas y comentarios</h1>
        <?php 
        if (!isset($_SESSION["rol"])) {
            echo '<a href=router.php?controller=auth&method=showLogin> <button>Inicia sesion para escribir una reseña</button> </a>';
        } else{
            echo '<button id=openerResena>Escribe una reseña</button>';
        }
        echo "</div>";

        echo "<div class='reviews'>";
        $i = 0;
        while($reseña = $reseñas->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='r'>";
                echo "<div class='r_user'> <img src='"; echo BASE_URL.'/img/users/'. $reseña['imagen_perfil']; echo "' > <p> $reseña[nombre] </p> </div>";
                echo "<div class='titulo_r'> <div class='estrellas'>"; 
                for($i = 0; $i< 5; $i++){
                    if($i < $reseña["rating"]){
                        echo "<span style='background-color: #fcec0d;'></span>";
                    } else{
                        echo "<span style='background-color: #ffffff;'></span>";
                    }
                    
                } 
                echo "</div> <p> $reseña[titulo] </p> </div>";
                echo "<div class='r_cuerpo'> <p> $reseña[cuerpo] </p> </div>";
            echo "</div>";
            $i++;
        }
        if($i == 0){
            echo "<p> Este museo no tiene reseñas </p>";
        }
        echo "</div>";
        ?>
    </section>

    <div class="popup_comprar_ticket" id="popupResenna" title="Publicar reseña">
        <?php $usuario = json_decode($_COOKIE['auth'], true);?>
        <form action="router.php?controller=usuario&method=publicarResenna&tablename=post" method="post" id="publicarReseña">
            <h1><?php echo $museo['nombre'];?></h1>
            <input type="text" placeholder="titulo de reseña" name="titulo">
            <textarea name="cuerpo" placeholder="Escribe aqui tu experiencia"></textarea>
            <input type="number" name="id_usuario" value="<?php echo $usuario['id'];?>" hidden>
            <input type="text" name="id_museo" value="<?php echo $museo['id'];?>" hidden>
            <input type="range" min="0" max="5"  name="rating" value="5">
            <input type="submit" value="Enviar reseña">
        </form>
    </div>

    <div class="popup_comprar_ticket" id="popup" title="Compra de tickets">
        <form action="router.php?controller=detallesMuseo&method=comprarEntrada&id=<?php echo $_GET['id'];?>&tablename=detalles_pago" method="post" id="comprarTicket">
            <label for="">Cantidad de tickets</label>
            <input type="number" name="cantidad">
            <select name="metodo_pago">
                <option value="1">Pago unico</option>
                <option value="6">Pago mensual</option>
            </select>
            <label for="">Pago reducido</label>
            <input type="checkbox" name="reducido">
            <input type="submit" value="Enviar">
        </form>
    </div>
</main>

<script type="module">
import { comprobador } from '<?php echo BASE_URL; ?>scripts/control.js';

let ticketsControll = new comprobador('comprarTicket')

let entradasControll = new comprobador('publicarReseña')

document.getElementById('comprarTicket').addEventListener('submit', (e) => {
  ticketsControll.comprobarTickets(e);
});

document.getElementById('publicarReseña').addEventListener('submit', (e) => {
  entradasControll.comprobarReseña(e);
});
</script>