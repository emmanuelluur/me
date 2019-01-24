<?php
namespace App\Controller;

use App\Controller\TemplateEngine;

class IndexController extends TemplateEngine
{
    public function GetPage()
    {
        echo $this->RenderPage('resume.twig');
    }

    public function Get404()
    {
        echo $this->RenderPage('resume.twig');
    }
    public function Get403()
    {
        echo $this->RenderPage('resume.twig');
    }
}
