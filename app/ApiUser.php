<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ApiUser extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    public $table = "api_users";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nom','pwd'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pwd',
    ];
    

     /**
     * username
     *
     * @return void
     */
    public function username()
    {
        return 'nom';
    }
}
