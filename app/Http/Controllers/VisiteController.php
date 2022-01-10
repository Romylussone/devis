<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visites as Trace ;
use App\Actionsvisiteurs as Actions ;

class VisiteController extends Controller
{
    //
    
    /**
     * traceStart : enregistrer tous démarrage de visite d'une ecole;
     * Quand l'utilisateur click sur vister pour rentrer dans le bureau du conseiller
     *
     * @param  mixed $request
     * @return void
     */
    public function traceStart(Request $request)
    {
        $tracevisite = new Trace() ;
        $isAnonyme = $request->input('isAnonyme');

        if($isAnonyme == 'false'){
            //On enregistre les traces de la visite pour l'utilisateur connecté 

            $tracevisite->visiteurID = $request->input('visiteurID');
            $tracevisite->etablissementID = $request->input('idEcole');
            $tracevisite->visteDateTime = date("Y-m-d H:i:s");
            $tracevisite->typeVisite = "Identifier";
        }
        else {
            $tracevisite->visiteurID = $request->ip();
            $tracevisite->etablissementID = $request->input('idEcole');
            $tracevisite->visteDateTime = date("Y-m-d H:i:s");
        }

        //On enregistre les infos de la visite
        $tracevisite->save();

        return response('ok', 200);
        
    }

    
    /**
     * actionsVisiteurs
     *
     * @return void
     */
    public function actionsVisiteurs(Request $request)
    {
        //Pour enregistrer les actions visiteurs
        $tracevisite = new Trace() ;
        $actionsVisi = new Actions();
        $description = "";
        
        switch ($request->input('type'))
        {
            case "brochure" : //
                $description = "Telechargement de la brochure" ;
                break;
            case "visite-virtuelle" : //
                $description = "Visite virtuelle de l'établissement" ;
                break;
            case "site-web" : //
                $description = "Visite du site web de l'établissement" ;
                break;
            case "demande-rdv" : //
                $description = "Demande de RDV" ;
                break;
            case "envoie-badge" : //
                $description = "Envoie de badge à l'établissementID" ;
                break;
        }
        $isAnonyme = $request->input('isAnonyme');
        
        if($isAnonyme == 'false'){
            $visite = $tracevisite->where('visiteurID', $request->input('visiteurID'))
                    ->where('etablissementID', $request->input('idEcole'))->first();                    
        }
        else {
            $visite = $tracevisite->where('visiteurID', $request->ip())
                    ->where('etablissementID', $request->input('idEcole'))->first();
        }

        $actionsVisi->visiteID = $visite->visiteID;
        $actionsVisi->typeAction = $request->input('type');
        $actionsVisi->descriptionAction = $description ;

        //On enregistre les actions du visiteur 
        $actionsVisi->save();

        return response('ok', 200);
    }
}
