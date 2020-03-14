<?php

use Core\Controller;
use Core\Table;

class HomeController extends Controller
{
    /* --------------- */
    /* construtor
    /* --------------- */       
    public function __construct()
    {
        // chama construtor da classe base
        parent::__construct();  
    }

    /* --------------- */
    /* rota default
    /* --------------- */   
    public function index($params)
    {   
        // redirect para controlador de doadores
        header("Location: " . CONFIG["BASEURL"] . "/doadores/listar");
        exit;
    }

}