<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TailleAnses extends Model
{
    public $table = "taille_anses";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'taille',
    ];
}
