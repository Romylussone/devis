<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verificationemail extends Model
{
    /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'email', '', 'code',
    ];

    /**
     * La liste des attr qui serons caché dans le tableau
     *
     * @var array
     */
    protected $hidden = [
        'code',
    ];
    
}
