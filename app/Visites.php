<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visites extends Model
{
    public $table = "visites";
    protected $primaryKey = 'visiteID';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'visiteurID', 'typeVisite', 'etablissementID', 'visteDateTime', 'visiteDuree',
    ];

}
