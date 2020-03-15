<?php

require "./models/Doador.php";
require "./models/IntervaloDoacao.php";
require "./models/FormaPagamento.php";

use Core\Controller;
use Core\Table;

use Models\Doador;
use Models\DoadorEndereco;
use Models\IntervaloDoacao;
use Models\FormaPagamento;

class DoadoresController extends Controller
{
    public function __construct()
    {
        parent::__construct();  

        $alert = new stdClass();

        // 1. carrega intervalos de doacao cadastrados && formas pagamento ativas 
        $intervalosdoacao = (new IntervaloDoacao())->where(["situacao = 1"])->find();
        $formaspagamento = (new FormaPagamento())->where(["situacao = 1"])->find();

        // 2. passa valores para serem transportados pra view
        $this->viewbag->intervalosdoacao = $intervalosdoacao;
        $this->viewbag->formaspagamento = $formaspagamento;
    }

    /* ------------------- */
    /* Listar doadores
    /* ------------------- */    
    public function listar()
    {   
        /* 1. instancia objeto que renderiza tabela na view */
        $table = new Table("table table-default nowrap");

        /* 2. adiciona colunas */
        $table->AddColumn("", "30px"); // toolbar
        $table->AddColumn("Nome", "30px");
        $table->AddColumn("Email", "30px");
        $table->AddColumn("CPF", "30px");
        $table->AddColumn("Idade", "30px");        
        $table->AddColumn("Observações", "100%");                        
        
        /* 3. carrega doadores cadastrados */
        $doadores = (new Doador())->all();

        /* 4. popula tabela com dados */
        foreach($doadores as $doador) {
            /* 4.1 links de remocao/edicao dos registros */
            $removeUrl = "<a class='post-confirm btn-link text-danger' data-message=\"Confirma exclusão do registro?\" href='" . CONFIG["BASEURL"]. "/doadores/apagar/" . $doador->id. "'><i class=\"fa fa-trash\"></i></a>";
            $editUrl = "<a class='post btn-link text-primary' href='" . CONFIG["BASEURL"] . "/doadores/editar/" .$doador->id. "'><i class=\"fa fa-edit\"></i></a>";                                        

            $table->AddRow([
                "{$removeUrl} &nbsp; {$editUrl}",
                "{$doador->nome}",
                "{$doador->email}",
                "{$doador->cpf}",
                ageFromDate($doador->datanascimento),
                "{$doador->observacoes}"
            ]);
        }

        /* 5. seta objeto table para ser enviado a view */        
        $this->viewbag->table = $table;

        /* 6. chama a view */
        return $this->View("Doadores/Listar", "Principal");
    }


    /* --------------- */
    /* Cadastrar novo doador
    /* --------------- */
    public function cadastrar()
    {   
        if($this->isPostBack()) {

            $doador = new Doador();
            $doador->fromArray($_POST);
            $save = $doador->save();

            if(!$save)
            {
                $alert->icon = "fa fa-alert";
                $alert->body = "Não conseguimos processar sua requisição. {$doador->error->getMessage()}";
                $this->viewbag->alert = $alert;                                

                return $this->View("Doadores/Cadastrar", "Principal");
                exit;
            }     
            
            $endereco = new DoadorEndereco();
            $endereco->fromArray($_POST);
            $endereco->iddoador = $doador->id;

            if(!empty($_POST["idendereco"])) {
                $endereco->id = $_POST["idendereco"];
            }

            $save = $endereco->save();

            if(!$save)
            {
                $alert->icon = "fa fa-alert";
                $alert->body = "Não conseguimos processar sua requisição. {$endereco->error->getMessage()}";
                $this->viewbag->alert = $alert;                                

                return $this->View("Doadores/Cadastrar", "Principal");
                exit;
            }                 

            $alert->icon = "fa fa-check";
            $alert->body = "Cadastro salvo!";

            $this->viewbag->alert = $alert;                                
            $this->viewbag->model = (new Doador())->find($doador->id);
        }

        // chama view
        return $this->View("Doadores/Cadastrar", "Principal");
    }    


    /* --------------- */
    /* Alterar doador
    /* --------------- */
    public function editar($params)
    {   
        $doador = (new Doador())->find($params[0]);
        $this->viewbag->model = $doador;

        if($this->isPostBack()) {

            $doador = new Doador();
            $doador->fromArray($_POST);
            $save = $doador->save();

            if(!$save)
            {
                $alert->icon = "fa fa-alert";
                $alert->body = "Não conseguimos processar sua requisição. {$doador->error->getMessage()}";
                $this->viewbag->alert = $alert;                                

                return $this->View("Doadores/Editar", "Principal");
                exit;
            }     

            $endereco = new DoadorEndereco();
            $endereco->fromArray($_POST);
            $endereco->iddoador = $doador->id;

            if(!empty($_POST["idendereco"])) {
                $endereco->id = $_POST["idendereco"];
            }

            $save = $endereco->save();

            if(!$save)
            {
                $alert->icon = "fa fa-alert";
                $alert->body = "Não conseguimos processar sua requisição. {$endereco->error->getMessage()}";
                $this->viewbag->alert = $alert;                                

                return $this->View("Doadores/Cadastrar", "Principal");
                exit;
            }                             
            
            $alert->icon = "fa fa-check";
            $alert->body = "Cadastro salvo!";

            $this->viewbag->alert = $alert;                                
            $this->viewbag->model = (new Doador())->find($doador->id);
        }

        // X. chama view
        return $this->View("Doadores/Editar", "Principal");
    }    

    /* --------------- */
    /* Apagar doador
    /* --------------- */
    public function apagar($params)
    {
        $doador = (new Doador())->find($params[0]);
        $doador->delete();

        header("Location: " . CONFIG["BASEURL"] . "/doadores/listar");
        exit;
    }

}