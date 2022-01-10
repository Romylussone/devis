<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actionsvisiteurs extends Model
{
    public $table = "actionsvisiteurs";
    protected $primaryKey = 'actionVisiteurID';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'visiteID', 'typeAction', 'descriptionAction',
    ];
}
