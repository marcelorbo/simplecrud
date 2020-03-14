<?php

namespace Core;

use Core\Router;
use Core\ViewBag;

class Controller 
{
    public $viewbag;

    public function __construct()
    {
        $this->viewbag = new ViewBag();
    }

    public function method()
    {
        return ($_SERVER['REQUEST_METHOD']);
    }

    public function View($page, $master)
    {
        return Router::View($page, $this->viewbag, $master);
        exit;
    }

    public function Redirect($path, $uri)
    {
        return Router::Redirect($path, $uri);
        exit;
    }    

    public function isPostBack()
    {
       return ($_SERVER['REQUEST_METHOD'] == 'POST');
    }    


}