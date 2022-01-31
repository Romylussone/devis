<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecteurActivites extends Model
{
    public $table = "secteur_activites";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'qte', 'libelle',
    ];
}
