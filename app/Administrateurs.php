<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrateurs extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public $table = "administrateurs";
    protected $primaryKey = 'id';

    /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'login','pwd', 'email', 'tel', 'nom',  'prenoms',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pwd', 'remember_token',
    ];

    /**
     * username
     *
     * @return void
     */
    public function username()
    {
        return 'login';
    }
}
