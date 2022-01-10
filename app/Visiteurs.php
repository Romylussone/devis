<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Visiteurs extends Authenticatable 
{
    public $table = "visiteurs";
    protected $primaryKey = 'visiteurID';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nomVisiteur', 'prenomVisiteur', 'loginVisiteur', 'emailVisiteur', 'pwdVisiteur',
    ];

    /**
     * La list des attr qui serons caché dans le tableau
     *
     * @var array
     */
    protected $hidden = [
        'pwdVisiteur', 'remember_token',
    ];
    

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->pwdvisiteur;
    }

}
