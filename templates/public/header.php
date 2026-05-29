<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MuseoWeb</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/core.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/home.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/register.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/detallesGeneral.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/detallesMuseo.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/navegacion.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/footer.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/responsive.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/fontawesome-free-7.2.0-web/css/fontawesome.min.css">

    <script type="module" src="<?php echo BASE_URL; ?>scripts/control.js"></script>
    <script type="module" src="<?php echo BASE_URL; ?>scripts/alerts.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<script>
    $(document).ready(function() {
        $(".menu-toggle").click(function() {
            $(".menu").slideToggle();
        });
    });
</script>

<body>
    <header>
        <div>
            <h1><a href="router.php?controller=home&method=showIndex">MuseoWeb</a></h1>

            <div class="menu-toggle">
                ☰
            </div>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="router.php?controller=home&method=showIndex">Inicio</a></li>
                <li><a href="router.php?controller=navegacion&method=showIndex&tablename=museo&offset=0">Museos</a></li>
                <li><a href="router.php?controller=navegacion&method=showIndex&tablename=monumentos&offset=0">Monumentos</a></li>
                <li><a href="router.php?controller=navegacion&method=showIndex&tablename=exposiciones&offset=0">Exposiciones</a></li>
                <?php
                if (!isset($_SESSION['rol'])) {
                    echo '<li><a href="router.php?controller=auth&method=showRegister">Crear cuenta</a></li>';
                    echo '<li><a href="router.php?controller=auth&method=showLogin">Iniciar sesión</a></li>';
                } else {
                    echo '<li><a href="router.php?controller=cuenta&method=showIndex">Cuenta</a></li>';
                    if ($_SESSION['rol'] == 'admin') {
                        echo '<li><a href="router.php?controller=index&section=admin">Panel de administrador</a></li>';
                    }
                    echo '<li><a href="router.php?controller=auth&method=logout">Cerrar sesion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main class="">