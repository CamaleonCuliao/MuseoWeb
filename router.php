<?php
session_start();

require 'config/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = $_GET["controller"] ?? "index";
$method     = $_GET["method"]     ?? "";
$section    = $_GET["section"]    ?? "public";

// --- Seguridad: sólo valores permitidos ---
$allowedSections = ["admin", "public"];
if (!in_array($section, $allowedSections)) {
    $section = "public";
}

// --- Protección del panel de administración ---
if ($section === "admin") {
    if ($_SESSION["rol"] != "admin") {
        header("Location: router.php?controller=auth&method=showLogin");
        exit;
    }
}

// --- Cargar template según sección ---
require "templates/{$section}/header.php";

// --- Enrutamiento ---
if ($controller === "index") {
    require $section === "admin" ? "view/admin/index.php" : "index.php";
} else {
    $class          = $controller . "Controller";
    $controllerFile = "controllers/{$section}/{$class}.php";

    if (file_exists($controllerFile)) {
        require $controllerFile;
        $obj = new $class();

        if ($method && method_exists($obj, $method)) {
            $obj->$method();
        } else {
            // Si no encuentra metodo
            echo "<script type='module'> import { errorMetodo } from '".BASE_URL."scripts/alerts.js'; errorMetodo() </script>";
        }
    } else {
        echo "<script type='module'> import { errorControlador } from '".BASE_URL."scripts/alerts.js'; errorControlador() </script>";
    }
}

require "templates/{$section}/footer.php";