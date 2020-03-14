<?php

namespace Models;

require_once __DIR__ . '/DoadorEndereco.php';

use Core\ActiveRecord;

class Doador extends ActiveRecord
{
    protected $table = 'doadores';

    public function endereco() {
        return (new DoadorEndereco())->where(["iddoador = {$this->id}"])->first();
    }
}