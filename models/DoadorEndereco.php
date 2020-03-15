<?php

namespace Models;

use Core\ActiveRecord;

class DoadorEndereco extends ActiveRecord
{
    protected $table = 'doadores_enderecos';

    public function fromArray(array $array)
    {
        foreach(array_keys($array) as $field) {
            if(!in_array($field, ["cep", "logradouro", "numero", "complemento", "bairro", "cidade", "uf"])) {
                unset($array[$field]);    
            }
        }

        parent::fromArray($array);
    }

}