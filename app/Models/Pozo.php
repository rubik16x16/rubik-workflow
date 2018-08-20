<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pozo extends Model
{
    protected $table = "USR_FCTPZO";
    protected $primaryKey= "USR_FCTPZO_CODIGO";

    public $incrementing= false;
    protected $connection = "sqlserver";
}
