<?php

use Core\Controller;

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();  
    }

    public function route($params)
    {
        return $this->Redirect("./controllers/api", $params);
    }      

}