<?php
/*
* Archivo Con las rutas de la aplicación
* By @Emmanuelluur
* 2019
*/
// rutas
$route = $_GET['route'] ?? 'inicio';
$acceso = false;    //  cambia de estado con session a true
//  rutas paginas metodo GetPage
$map = [
    "inicio" => [
        "action" => "GetPage",
        "protected" => false, //  ruta protegida, al usar login, poner en true las que solo usuarios logeados puedan acceder
        "controller" => "App\Controller\IndexController",
    ],
];
/*
*   Array de acciones de los controlladores
*   son llamados por js
*/
$post = [
    "mail" => [
        "action" => "Send",
        "validate" => true, //  valida, cambia a false para cancelar la comunicacion con contrller
        "controller" => "App\Controller\MailController",
    ],
    
];
