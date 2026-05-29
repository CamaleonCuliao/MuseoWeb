<style>
    .informacion_general {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        gap: 15px;

        margin-top: 30px;
    }

    .informacion_general div{
        display: flex;
        flex-direction: column;
        justify-content: center;

        width: 80%;

        padding: 15px;
        border-radius: 15px;

        background-color: #173B45;
        color: white;
    }

    .informacion_general img {
        border-radius: 15px;
    }

    .informacion_general h1 {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .informacion_general div a{
        text-decoration: none;
        color: white;
    }

    /* RESEÑAS */

    .review{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 15px;
    }

    .review h1{
        text-align: center;
    }

    .review div{
        display: flex;
        flex-direction: column;
        justify-content: center;

        width: 80%;
    }

    .publicar a{
        width: 100%;
    }

    .publicar button {
        background-color: #fff;
        color: black;
        border: none;
        border-radius: 10px;
        outline: none;

        width: 100%;

        -webkit-box-shadow: 0px 0px 5px 3px rgba(0,0,0,0.25); 
        box-shadow: 0px 0px 5px 3px rgba(0,0,0,0.25);
    }

    .reviews{
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        
        gap: 15px;
    }

    .reviews div {
        background-color: rgb(25, 25, 25);
        color: white;

        width: 100%;
        padding: 15px;
        border-radius: 15px;
    }

    /* RESEÑAS INDIVIDUALES */

    .reviews .r {
        gap: 10px;
    }

    .reviews .r div{
        display: flex;
        flex-direction: row;
        justify-content: left;
        align-items: center;

        padding: 0;
    }

    .reviews .r div img {
        width: 20px;
        height: 20px;

        border-radius: 100%;
    }

    .reviews .r .titulo_r {
        justify-content: space-between;
    }

    .reviews .r div * {
        margin: 0;
    }

    .reviews .r .r_user {
        gap: 10px;
    }

    .reviews .r .estrellas {
        width: 25%;
    }

    .estrellas * {
        /* Forma sacada de https://css-shape.com/star */
        clip-path: polygon(50% 0,79% 90%,2% 35%,98% 35%,21% 90%); 

        width: 20px;
        height: 20px;
    }

    .reviews .r .r_cuerpo {
        background-color: white;
        color: black;
        border-radius: 5px;
        padding: 5px;
    }

    /* POPUP */

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 8px;
        min-width: 300px;
        z-index: 10;
    }
</style>

<main>
        <section class="informacion_general">
        <?php 
            $generico = $stm->fetch(PDO::FETCH_ASSOC);
            echo "
            <div class='cabeza_museo'>
            <img src='".BASE_URL."img/".$generico['imagen']."'>
            <h1>".$generico['nombre']."</h1>
            <p>".$generico['descripcion']."</p>
            </div>

            <div class='museo_exposiciones'>
            <h4>Parte del museo</h4>";
            while($row = $museos->fetch(PDO::FETCH_ASSOC)){
                if($row["id"] == $generico["id_museo"]){
                    echo "<a href = 'router.php?controller=detallesMuseo&method=showIndex&id=$row[id]&tablename=museo'>". $row["nombre"] ." </a>";
                }
            }
        echo "</div>";

        echo "<div class='seis'>
            <h4>Localización</h4>
            <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3128.80642923377!2d-0.4793741235367975!3d38.3534620786143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6237a666f7cb3d%3A0x9a7da0483cc1744!2sMuseo%20Arqueol%C3%B3gico%20de%20Alicante%20MARQ!5e0!3m2!1ses!2ses!4v1779880346810!5m2!1ses!2ses' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
        </div>";
        ?>
    </section>
</main>