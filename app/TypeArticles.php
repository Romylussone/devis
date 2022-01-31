<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeArticles extends Model
{
    public $table = "type_articles";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'nom_fichier_img',
    ];
}
