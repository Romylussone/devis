<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeQteArticle extends Model
{
    public $table = "list_qte_articles";
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
