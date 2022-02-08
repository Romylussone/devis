<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TailleArticles extends Model
{
    public $table = "taille_articles";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'hauteur', 'largeur', 'souflet', 'libelle', 'statut',
    ];
}
