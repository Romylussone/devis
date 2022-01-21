<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public $table = "articles";
    protected $primaryKey = 'code';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'type_article_id', 'taille_article_id', 'grammage_article_id', 'type_impresion_article_id','lienCouleur'
    ];
}
