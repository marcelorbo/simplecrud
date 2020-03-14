<?php

namespace Models;

/* --------------------- */
/* Includes Child Models */
/* --------------------- */
// require_once __DIR__ . '/ChildModel.php';

use Core\ActiveRecord;

class Model extends ActiveRecord
{
    /* ------------------ */
    /* Set table name */
    /* ------------------ */    
    protected $table = 'tablename';

}