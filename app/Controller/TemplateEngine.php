<?php
namespace App\Controller;

/**
* Controlador para Template Controller
* By Emmanuel Lucio Urbina
* 2019
* Inventario
* @emmanuelluur
*/
use \Twig_Environment;
use \Twig_Loader_Filesystem;
class TemplateEngine
{
    protected $templeteEngine;
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem("../views/");
        $this->templeteEngine = new Twig_Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
    }
    public function RenderPage($fileName, $data = [])
    {
        # exeption para evitar mostrar error de twig loader ;)
        try {
            return $this->templeteEngine->render($fileName, $data);
        } catch (\Exception $e) {
            return $this->templeteEngine->render('404.twig');
        }
    }
}
