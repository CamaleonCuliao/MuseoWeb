<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/core.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/core.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<style>
    body{
        display: flex;
        flex-direction: column;
        height: 100vh;
        background-color: #faf7f3;
        color: rgb(25, 25, 25);
    }

    /* HEADER */

    header{
        height: 10%;
        background-color:rgb(25, 25, 25);
        color: #faf7f3;
    }

    header h1 a{
        text-decoration: none;
        color: #faf7f3;
    }

    header div{
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        margin-left: 5%;
        margin-right: 5%;
    }

    header div *{
        margin: 0;
    }

    header div h1{
        height: 50%;
    }

    header div nav{
        margin: 0;
        height: 50%;
        display: flex;
    }

    header div nav ul{
        padding-left: 0;
        display: flex;
    }

    header div nav ul li{
        list-style: none;
        margin: 0 auto 0 auto;
    }

    /* SUBMENUS */

    .menu {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .menu li {
        position: relative;
        cursor: pointer;
        padding: 10px;
    }

    .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        list-style: none;
        padding: 10px;
        min-width: 150px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);

        z-index: 9999; /* IMPORTANTE */
    }

    .submenu li {
        padding: 8px;
    }

    .submenu li a{
        text-decoration: none;
        color: rgba(25, 25, 25);
    }

    /* MAIN */

    main{
        height: 80vh;
    }

    /* FOOTER */

    footer{
        height: 10vh;
    }
</style>

<script>
$(document).ready(function () {

    $(".menu > li").hover(
        function () {
            $(this).find(".submenu").stop(true, true).slideDown(200);
        },
        function () {
            $(this).find(".submenu").stop(true, true).slideUp(200);
        }
    );

});
</script>

<body>
<header>
    <div>
        <h1><a href="router.php?controller=index">MuseoWeb</a></h1>

        <nav>
            <ul class="menu">
                <li>
                    Museos
                    <ul class="submenu">
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=museo&section=admin">Museos</a></li>
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=exposiciones&section=admin">Exposiciones</a></li>
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=monumentos&section=admin">Monumentos</a></li>
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=visitas_guiadas&section=admin">Visitas guiadas</a></li>
                    </ul>
                </li>

                <li>
                    Usuarios
                    <ul class="submenu">
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=auth&section=admin">Auth</a></li>
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=usuarios&section=admin">Usuarios</a></li>
                    </ul>
                </li>

                <li>
                    Social
                    <ul class="submenu">
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=post&section=admin">Publicaciones</a></li>
                        <li><a class="dropdown-item" href="router.php?controller=user&method=showIndex&tablename=usuario&section=admin">Reseñas</a></li>
                    </ul>
                </li>

                <li><a href="router.php?controller=home&method=showIndex">Volver a inicio</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>