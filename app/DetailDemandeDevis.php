<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDemandeDevis extends Model
{
    public $table = "detail_demande_devis";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'demande_devis_id', 'code_article', 'qte_article',
    ];
}
