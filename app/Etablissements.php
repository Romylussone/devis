<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissements extends Model
{
    protected $primaryKey = 'etablissementID';

    /**
     * Les attributs pour une assignation en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nomEtabli', 'nomCompletEtabli', 'sitewebEtabli', 'lienVisiteEtabli', 'lienVideo','fb_page_id', 'email_etabli','cheminImghome',
    ];

}
