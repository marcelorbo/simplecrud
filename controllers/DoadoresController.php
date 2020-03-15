<?php

require "./models/Doador.php";
require "./models/IntervaloDoacao.php";
require "./models/FormaPagamento.php";

use Core\Controller;
use Core\Table;

use Models\Doador;
use Models\IntervaloDoacao;
use Models\FormaPagamento;

class DoadoresController extends Controller
{
    /* --------------- */
    /* construtor
    /* --------------- */       
    public function __construct()
    {
        // chama construtor da classe base
        parent::__construct();  
    }

    /* ------------------- */
    /* Listar todos
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
                "{$doador->datanascimento}",
                "{$doador->observacoes}"
            ]);
        }

        /* 5. seta objeto table para ser enviado a view */        
        $this->viewbag->table = $table;

        /* 6. chama a view */
        return $this->View("Doadores/Listar", "Principal");
    }

    /* ------------------- */
    /* Cadastrar novo
    /* ------------------- */    
    public function cadastrar()
    {   
        // 1. carrega intervalos de doacao cadastrados && formas pagamento 
        $intervalosdoacao = (new IntervaloDoacao())->where(["situacao = 1"])->find();
        $formaspagamento = (new FormaPagamento())->where(["situacao = 1"])->find();

        // 2. passa valores para serem transportados pra view
        $this->viewbag->intervalosdoacao = $intervalosdoacao;
        $this->viewbag->formaspagamento = $formaspagamento;

        // 3. se por post, recebe dados do doador e persiste
        if($this->isPostBack()) {

            // 3.0 cria instancia da classe Doador e recebe dados do POST
            $doador = new Doador();
            $doador->fromArray($_POST);

            // 3.1 trata data e valor
            $doador->datanascimento = (DateTime::createFromFormat('d/m/Y', $_POST["datanascimento"]))->format("Y-m-d");
            $doador->valordoacao = realToFloat($_POST["valordoacao"]);

            // 3.3 salva
            $save = $doador->save();

            $alert = new stdClass();

            if(!$save)
            {
                $alert->icon = "fa fa-alert";
                $alert->body = "Não conseguimos processar sua requisição. {$doador->error->getMessage()}";
                $this->viewbag->alert = $alert;                                

                return $this->View("Doadores/Cadastrar", "Principal");
                exit;
            }     
            
            $alert->icon = "fa fa-check";
            $alert->body = "Cadastro salvo!";

            $this->viewbag->alert = $alert;                                
            $this->viewbag->model = $doador;
        }

        // X. chama view
        return $this->View("Doadores/Cadastrar", "Principal");
    }    

    /* ------------------- */
    /* Alterar doador
    /* ------------------- */    
    public function editar($params)
    {   
        // 0. carrega doador
        $doador = (new Doador())->find($params[0]);
        $this->viewbag->model = $doador;

        // 1. carrega intervalos de doacao cadastrados && formas pagamento 
        $intervalosdoacao = (new IntervaloDoacao())->where(["situacao = 1"])->find();
        $formaspagamento = (new FormaPagamento())->where(["situacao = 1"])->find();

        // 2. passa valores para serem transportados pra view
        $this->viewbag->intervalosdoacao = $intervalosdoacao;
        $this->viewbag->formaspagamento = $formaspagamento;

        // 3. se por post, recebe dados do doador e persiste
        if($this->isPostBack()) {

            // 3.0 cria instancia da classe Doador e recebe dados do POST
            $doador = new Doador();
            $doador->fromArray($_POST);

            var_dump($doador);
            exit;

            // 3.3 salva
            $save = $doador->save();

            $alert = new stdClass();

            if(!$save)
            {
                $alert->icon = "fa fa-alert";
                $alert->body = "Não conseguimos processar sua requisição. {$doador->error->getMessage()}";
                $this->viewbag->alert = $alert;                                

                return $this->View("Doadores/Editar", "Principal");
                exit;
            }     
            
            $alert->icon = "fa fa-check";
            $alert->body = "Cadastro salvo!";

            $this->viewbag->alert = $alert;                                
            $this->viewbag->model = $doador;
        }

        // X. chama view
        return $this->View("Doadores/Editar", "Principal");
    }    

    /* -------------- */
    /* Apagar */
    /* -------------- */    
    public function apagar($params)
    {
        $doador = (new Doador())->find($params[0]);
        $doador->delete();

        header("Location: " . CONFIG["BASEURL"] . "/doadores/listar");
        exit;
    }

}