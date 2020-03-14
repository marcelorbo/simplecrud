<?php

use Core\Controller;
use Core\Table;

class HomeController extends Controller
{
    /* --------------- */
    /* Construtor
    /* --------------- */
    public function __construct()
    {
        // chama construtor base
        parent::__construct();  
    }

    /* --------------- */
    /* Rota default, listagem de doadores cadastrados
    /* --------------- */   
    public function index($params)
    {   
        $table = new Table("table table-default");

        $table->AddColumn("Nome", "100px");
        $table->AddColumn("Email", "100%");      
        
        $table->AddRow([
            "Marcelo",
            "marcelo@estartar.com"
        ]);

        $table->AddRow([
            "Joao",
            "joao@estartar.com"
        ]);        

        $this->viewbag->table = $table;

        return $this->View("Home/Index", "Principal");
    }

}