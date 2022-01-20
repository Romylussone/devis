<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    public $table = "devis";
    protected $primaryKey = 'numero';
}
