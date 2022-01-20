<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprises extends Model
{
    public $table = "entreprises";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'ville', 'pays','adresse1', 'adresse_livraison', 'adresse2', 'code_postale', 'secteur_activite',
    ];
}
