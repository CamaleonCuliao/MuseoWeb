<style>
    .cuenta {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        margin-top: 30px;
        margin-bottom: 30px;
    }

    .cuenta form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 20px;
    }

    .caja_perfil {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        padding: 30px;

        margin-top: 30px;

        border-radius: 10px;

        background-color: #173B45;
        color: white;

        -webkit-box-shadow: 5px 5px 9px -3px rgba(0, 0, 0, 0.3);
        box-shadow: 5px 5px 9px -3px rgba(0, 0, 0, 0.3);
    }

    .caja_perfil .imagen {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        gap: 15px;
    }

    .caja_perfil img {
        width: 200px;
        height: 200px;

        border-radius: 100%;
        margin-top: 30px;
    }

    .caja_perfil h2 {
        color: white;
        margin-top: 30px;
        margin-bottom: 0;
    }

    .caja_perfil hr {
        width: 100%;
    }

    .informacion_usuario {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .informacion_usuario div {
        display: flex;
        flex-direction: row;
        justify-items: space-between;
        align-items: center;

        width: 100%;

        gap: 10px;
    }

    .informacion_usuario div i {
        margin-left: auto;
    }

    .informacion_usuario p {
        font-size: 20px;
        margin-bottom: 0;
    }

    .informacion_usuario i {
        margin-left: 20px;
    }

    .hide {
        display: none;
    }

    .show {
        display: inline-block;
    }

    .favoritos {
        width: 300px;
    }

    .edicion {
        width: 20%;
        margin: auto;
    }

  
</style>

<section class="cuenta">
    <h1>Tu perfil</h1>
    <form method="post" enctype="multipart/form-data" action="router.php?controller=cuenta&method=putCuenta&tablename=usuarios&id=<?php echo $usuario['id']; ?>">
        <div class="caja_perfil">
            <div class="imagen">
                <img src="<?php echo BASE_URL . '/img/users/' . $usuario['imagen_perfil'] ?>" alt="">
                <input type="file" name="imagen_perfil" class="hide" id="img">
                <label class="campo-editable hide" type="file" for="img">Subir imagen</label>
            </div>

            <h2>Información personal</h2>
            <hr>
            <div class="informacion_usuario">
                <div>
                    <p class="campo-visible"><?php echo $usuario['nombre']; ?></p>
                    <input type="text" value="<?php echo $usuario['nombre']; ?>" name="nombre" class="campo-editable hide">
                </div>
                <div>
                    <p class="campo-visible"><?php echo $usuario['descripcion']; ?></p>
                    <input type="text" value="<?php echo $usuario['descripcion']; ?>" name="descripcion" class="campo-editable hide">
                </div>
            </div>

            <h2>Museos favoritos</h2>
            <hr>
            <div class="informacion_usuario favoritos">
                <?php
                if ($comprobar->fetch(PDO::FETCH_ASSOC) == false) {
                    echo '<p> Sin museos añadidos </p>';
                } else {
                    echo "<section class='swiper'>";
                    echo "<div class='swiper-wrapper'>";
                    while ($row = $favoritos->fetch(PDO::FETCH_ASSOC)) {
                        renderizarCaja($row['imagen'], $row['nombre'], $row['id'], 'museo');
                    }
                    echo "</div>";
                    echo '</section>';
                }
                ?>
            </div>
        </div>
        </div>

<button id="btn-editar" type="button">Editar información personal</button>
<button id="btn-cancelar" class="hide" type="button">Cancelar</button>
<button id="btn-enviar" class="hide">Enviar</button>
</section>

</form>
</section>

<script>
    //codigo IA
    const btnEditar = document.getElementById("btn-editar");
    const btnCancelar = document.getElementById("btn-cancelar");
    const btnEnviar = document.getElementById("btn-enviar");

    const camposVisibles = document.querySelectorAll(".campo-visible");
    const camposEditables = document.querySelectorAll(".campo-editable");

    btnEditar.addEventListener("click", activarEdicion);
    btnCancelar.addEventListener("click", desactivarEdicion);

    function activarEdicion() {
        camposVisibles.forEach(el => el.classList.add("hide"));
        camposEditables.forEach(el => el.classList.remove("hide"));
        btnEditar.classList.add("hide");
        btnCancelar.classList.remove("hide");
        btnEnviar.classList.remove("hide");
    }

    function desactivarEdicion() {
        camposVisibles.forEach(el => el.classList.remove("hide"));
        camposEditables.forEach(el => el.classList.add("hide"));
        btnEditar.classList.remove("hide");
        btnCancelar.classList.add("hide");
        btnEnviar.classList.add("hide");
    }

  const swipers = document.querySelectorAll('.swiper');

  swipers.forEach((slider) => {
    new Swiper(slider, {
      loop: true,
      slidesPerView: 1,
    });
  });
</script>