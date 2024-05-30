<?php

namespace Config;

use config\Config;

require_once realpath('./vendor/autoload.php');
$router = new Config;

/* Login */
$router->get("/", ['Login', 'index']);
$router->get("/sigin", ['Login', 'sigin']);
$router->post("/validarLogin", ['Login', 'verificar_login']);
$router->post("/validarRegistro", ['Sigin', 'verificar_login']);
$router->get("/logout", ['Login', 'cerrar_sesion']);

/* Productos */
$router->get("/inicio", ['Productos', 'index']);
$router->get("/agregar", ['Productos', 'agregar_vista']);
$router->post("/guardarProducto", ['Productos', 'agregar']);
$router->get("/editarProducto", ['Productos', 'editar_vista']);
$router->post("/editar", ['Productos', 'actualizar']);
$router->get("/eliminarProducto", ['Productos', 'eliminar']);

$router->run();


?>