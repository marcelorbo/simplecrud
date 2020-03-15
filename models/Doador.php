<?php

namespace Models;

require_once __DIR__ . '/DoadorEndereco.php';

use Core\ActiveRecord;

class Doador extends ActiveRecord
{
    protected $table = 'doadores';

    public function fromArray(array $array) {
        
        foreach(["cep", "logradouro", "numero", "complemento", "bairro", "cidade", "uf"] as $field) {
            unset($array[$field]);
        }

        parent::fromArray($array);
    }

    public function endereco() {
        return (new DoadorEndereco())->where(["iddoador = {$this->id}"])->first();
    }
}