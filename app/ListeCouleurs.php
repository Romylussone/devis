<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeCouleurs extends Model
{
    public $table = "list_couleurs_articles";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'code_hex','statut',
    ];
}
