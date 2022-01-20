<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeImpressionArticles extends Model
{
    public $table = "type_impression_articles";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'nb_couleur',
    ];
}
