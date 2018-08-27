<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "STMPDH";
    protected $primaryKey = "STMPDH_ARTCOD";
    protected $connection = "sqlserver";
    public $incrementing= false;
  
}
