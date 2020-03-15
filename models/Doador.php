<?php

namespace Models;

require_once __DIR__ . '/DoadorEndereco.php';

use DateTime;
use Core\ActiveRecord;

class Doador extends ActiveRecord
{
    protected $table = 'doadores';

    /* ---------------------- */
    /* Sobrescreve funcao fromArray para tratar valores recebidos
    /* ---------------------- */    
    public function fromArray(array $array) {
        
        // 0. trata campos excedentes do endereco
        foreach(["idendereco", "cep", "logradouro", "numero", "complemento", "bairro", "cidade", "uf"] as $field) {
            unset($array[$field]);
        }

        // 1. trata formatos data e valor
        $array["datanascimento"] = (DateTime::createFromFormat('d/m/Y', $array["datanascimento"]))->format("Y-m-d");
        $array["valordoacao"] = realToFloat($array["valordoacao"]);

        // 2. chama metodo da classe pai
        parent::fromArray($array);
    }

    /* ---------------------- */
    /* Retorna endereco do doador
    /* ---------------------- */        
    public function getAddress() {
        return (new DoadorEndereco())->where(["iddoador = {$this->id}"])->first();
    }
}