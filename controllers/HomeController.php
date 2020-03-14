<?php

use Core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();  
    }

    public function index($params)
    {   
        $this->viewbag->teste = [];
        return $this->View("Home/Index", "App");
    }

}