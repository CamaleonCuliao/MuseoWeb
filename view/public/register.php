<section class="main_registro">
    <section class="formulario_registro">
        <h1>Registrar cuenta</h1>
        <form action="router.php?controller=auth&method=register&tablename=auth" method="post" id="crearUsuario">
            <input type="text" placeholder="Nombre de usuario" id="nombre" name="nombre" >
            <input type="email" placeholder="Correo electronico" name="email" >
            <input type="password" placeholder="Contraseña" name="contrasenna" >
            <button type="submit">Registrar</button>
        </form>
    </section>
</section>

</main>

<script type="module">
import { comprobador } from '<?php echo BASE_URL; ?>scripts/control.js';

let registroControll = new comprobador('crearUsuario')

document.getElementById('crearUsuario').addEventListener('submit', (e) => {
  registroControll.comprobarRegistro(e);
});
</script>