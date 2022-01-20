<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public $table = "contacts";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenoms', 'numero_tel','email', 'fonction', 'ip', 'entreprie_id'
    ];
}
