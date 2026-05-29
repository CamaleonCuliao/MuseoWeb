<?php
require __DIR__ . '/../../models/public/publicModel.php';

class authController {
    function showLogin() {
        require __DIR__ . '/../../view/public/login.php';
    }

    function showRegister(){
        require __DIR__ . '/../../view/public/register.php';
    }

    function login(){

        $m = new publicModel($_GET["tablename"]);
        $result = $m->yaExiste();

        if($result != false){
            //Guarda los datos personales del usuario en una cookie
            $auth = json_encode([
                    'nombre' => $result->nombre,
                    'id' => $result->id,
                    'email' => $result->email,
                    'contrasenna' => $result->contrasenna
            ]);

            //El rol se guarda en $_SESSION por motivos de seguridad
            if($result->id_roles == 2){
                setcookie('auth', $auth, time() + (86400 * 30), "/");
                $_SESSION['rol'] = 'admin';
                echo "<script type='module'> import { alertIniciarSesion } from '".BASE_URL."scripts/alerts.js'; alertIniciarSesion();  </script>";
            } else {
                setcookie('auth', $auth, time() + (86400 * 30), "/");
                $_SESSION['rol'] = 'user';
                echo "<script type='module'> import { alertIniciarSesion } from '".BASE_URL."scripts/alerts.js'; alertIniciarSesion(); </script>";
            }

            $_SESSION['id'] = $result->id;
        } else{
            echo "<script type='module'> import { errorIniciarSesion } from '".BASE_URL."scripts/alerts.js'; errorIniciarSesion();  </script>";
        }
    }

    function logout(){
        //El tiempo de expiracion de la cookie se pone como una hora antes
        setcookie('auth',  "", time() - 3600);
        $_SESSION = " ";
        session_unset();
        session_destroy();
        echo "<script type='module'> import { alertCerrarSesion } from '".BASE_URL."scripts/alerts.js'; alertCerrarSesion();  </script>";
    }
    
    function register(){
        //Control de parametros
        $m = new publicModel($_GET["tablename"]);
        $result = $m->yaExiste();

        if($result != false){
            echo "<script type='module'> import { errorCrearCuenta } from '".BASE_URL."scripts/alerts.js'; errorCrearCuenta(); </script>";
        } else {
            $m->registerAuth();
            echo "<script type='module'> import { cuentaCreada } from '".BASE_URL."scripts/alerts.js'; cuentaCreada(); </script>";
        }

    }
}
