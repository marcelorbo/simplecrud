<?php

/* ------------------------ */
/* Includes                 */
/* ------------------------ */
require "./models/Model.php";

use Core\Controller;

class WelcomeController extends Controller
{
    /* ------------ */
    /* Constructor */
    /* ------------ */    
    public function __construct()
    {
        /* Base Constructor */        
        parent::__construct();  
    }

    /* ------------ */
    /* Index    */
    /* ------------ */
    public function index($params)
    {   
        /* Set Viewbag Parameters */
        $this->viewbag->teste = [];

        /* Call View */
        return $this->View("Home/Index", "Principal");
    }

}