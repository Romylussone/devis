<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandeDevis extends Model
{
    public $table = "demande_devis";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'entreprise_id', 'date_demande',
    ];
}
