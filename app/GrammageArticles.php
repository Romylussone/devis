<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrammageArticles extends Model
{
    public $table = "grammage_articles";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'grammage',
    ];
}
