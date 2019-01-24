<?php
session_start();
require_once "../vendor/autoload.php";
require_once "../includes/rutas.php";

/**
 * Front Controller
 * By Emmanuel Lucio Urbina
 * 2019
 * @emmanuelluur
 */

//  variables de entorno
$dotenv = new Dotenv\Dotenv("../");
$dotenv->load();

date_default_timezone_set(getenv('TIME_ZONE'));

/*
 *   Metodos Front Controller
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_dump($_POST);die;
    if (array_key_exists($route, $post)) {
        $controller = new $post[$route]['controller'];
        $action = $post[$route]['action'];
        if ((isset($_POST['save']) || isset($_POST['Get']) || isset($_POST['post'])) && $post[$route]['validate']) {
            $controller->$action($_POST);
        } else {
            echo "Permisos Denegados";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!$route) {
        $controllerIndex = new App\Controller\IndexController;

        $controllerIndex->GetPage([]);
    } else {
        if (array_key_exists($route, $map)) {
            $controller = new $map[$route]['controller'];
            $action = $map[$route]['action'];
            if (($map[$route]['protected']) == ($acceso)) {
                $controller->$action($_GET);
            } else {
                $controller = new App\Controller\IndexController;
                $controller->Get403([]);
            }
        } else {
            $controller = new App\Controller\IndexController;
            $controller->Get404([]);
        }

    }
}
