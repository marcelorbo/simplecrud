<?php

require "./models/Doador.php";

use Core\Controller;
use Core\Table;
use Models\Doador;

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
        $table = new Table("table table-default");

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
            $removeUrl = "<a class='post-confirm btn-link text-danger' data-message=\"Confirma exclusão do registro?\" href='" . CONFIG["BASEURL"]. "/doadores/apagar/" . $item->id. "'><i class=\"fas fa-trash\"></i></a>";
            $editUrl = "<a class='post btn-link text-primary' href='" . CONFIG["BASEURL"] . "/doadores/editar/" .$item->id. "'><i class=\"fas fa-edit\"></i></a>";                                        
            
            $table->AddRow([
                "{$removeUrl} {$editUrl}",
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
    public function cadastrar($params = null)
    {   
        return $this->View("Doadores/Cadastrar", "Principal");
    }    

}