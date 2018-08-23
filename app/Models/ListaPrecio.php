<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaPrecio extends Model
{
    protected $table = "STTLPR";
    protected $connection = "sqlserver";
    protected $primaryKey = "STTLPR_CODLIS";
    public $incrementing= false;
}
