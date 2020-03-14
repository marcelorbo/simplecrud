<?php

/* ------------------------ */
/* Includes                 */
/* ------------------------ */
require "./models/Model.php";

use Core\Controller;
use Core\Table;
use Core\Pagination;

use Models\Model;

class TestsController extends Controller
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
        return $this->View("Tests/Index", "Welcome");
    }

    /* ------------ */
    /* Table    */
    /* ------------ */
    public function table($params)
    {   
        /* Set Viewbag Parameters */
        $table = new Table("table table-default");

        $table->AddColumn("Nome", "100px");
        $table->AddColumn("Email", "100%");      
        
        $table->AddRow([
            "Marcelo",
            "marcelo@estartar.com"
        ]);

        $this->viewbag->table = $table;

        /* Set alert message */
        $alert = new stdClass();
        $alert->icon = "fas fa-check";
        $alert->body = "Apenas um teste";
        $this->viewbag->alert = $alert;

        /* Call View */
        return $this->View("Tests/Table", "Welcome");
    }


    /* ------------ */
    /* Table Ajax    */
    /* ------------ */
    public function tableajax($params)
    {   
        if($this->isPostBack())
        {
            $draw = intval($_POST["draw"]);
            $start = $_POST['start'];
            $length = $_POST['length'];   
            $records = 15;
            $data = (new Model())->query("SELECT id, nome, email, mensagem FROM messages LIMIT {$start}, {$length}");

            $dataTableJson = new stdClass();
            $dataTableJson->draw = $draw;
            $dataTableJson->recordsTotal = $records;
            $dataTableJson->recordsFiltered = $records;   
            $dataTableJson->data = toDataTableArray($data);
    
            Json($dataTableJson);
            exit;
        }

        /* Set Viewbag Parameters */
        $table = new Table("table nowrap table-ajax");

        $table->AddColumn("", "100px");        
        $table->AddColumn("Nome", "100px");
        $table->AddColumn("Email", "100px");
        $table->AddColumn("Mensagem", "100%");

        $this->viewbag->table = $table;

        /* Call View */
        return $this->View("Tests/TableAjax", "Welcome");
    }    

    /* ------------ */
    /* Form    */
    /* ------------ */
    public function form($params)
    {   
        if($this->isPostBack())
        {
            $model = new Model();
            $model->fromArray($_POST);

            $alert = new stdClass();
            $alert->icon = "fas fa-check";
            $alert->body = "Requisição efetuada com sucesso!";
            $this->viewbag->alert = $alert;
        }

        /* Call View */
        return $this->View("Tests/Form", "Welcome");
    }     

    /* ------------ */
    /* Form Ajax    */
    /* ------------ */
    public function formajax($params)
    {   
        if($this->isPostBack())
        {
            $model = new Model();
            $model->fromArray($_POST);

            $retorno = new stdClass();
            $retorno->status = "success";
            $retorno->message = "Requisição processada com sucesso!";
            $retorno->data = toArray([$model]);

            return Json($retorno);
        }
        /* Call View */
        return $this->View("Tests/FormAjax", "Welcome");
    }    
    
    /* ------------ */
    /* Text Editor    */
    /* ------------ */
    public function texteditor($params)
    {   
        /* Set Viewbag Parameters */
        $this->viewbag->teste = [];

        /* Call View */
        return $this->View("Tests/TextEditor", "Welcome");
    }    

    /* ------------ */
    /* Pagination    */
    /* ------------ */
    public function pagination($params)
    {   
        /* get page */
        $page = !empty($params[1]) ? $params[1] : 1;

        /* Set Viewbag Parameters */
        $this->viewbag->pagination = (new Pagination($page, 5, 6, "/tests/pagination"));

        /* Call View */
        return $this->View("Tests/Pagination", "Welcome");
    }        


}