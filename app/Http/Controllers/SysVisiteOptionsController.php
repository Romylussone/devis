<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\SysVisiteBadgeMail as sendBadge;
use App\Mail\SysVisiteRdvMail as askRdv;
use App\Http\Controllers\PDFController as  PDF;

use App\Visiteurs;
use App\Badgevisiteurs;
class SysVisiteOptionsController extends Controller
{
    //
    /**
     * envoyerBadge
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function envoyerBadge(Request $request, $secret_id)
    {
        //On déchiffre l'id
        $id = \Illuminate\Support\Facades\Crypt::decryptString($secret_id);

        //Obtenir l'email de l'etablissement concernée
        $etablissement = \App\Etablissements::where('etablissementID', $request->input('idEcole'))->first();

        if(isset($etablissement))
        {
            //On récupère les infos users
            $visiteur = \App\Visiteurs::where('visiteurID', $id)->first();

            //On vérifie si le visiteur existe
            if(isset($visiteur))
            {
                //On récupère le badge visiteur
                $badgeVisiteur = \App\Badgevisiteurs::where('visiteurID', $id)->first();

                $isBac = is_null($badgeVisiteur->anneeBac) ? false : true ;
                $experiencePro = is_null($badgeVisiteur->experiencePro) ? "" : $badgeVisiteur->experiencePro;

                if($badgeVisiteur->isForMe)
                {
                    $dataEmail = [
                        "visiteurID" => $visiteur->visiteurID,
                        "nomVisiteur" => ucwords($visiteur->nomVisiteur." ".$visiteur->prenomVisiteur),
                        "emailVisiteur" => $visiteur->emailVisiteur,
                        "numeroVisiteur" => $badgeVisiteur->numTelVisiteur,
                        "isForMe" =>true,
                        "isBac" => $isBac,
                        "anneeBac" => $badgeVisiteur->anneeBac,
                        "typeBac" => ucwords($badgeVisiteur->typeBac),
                        "etablissementActuel" => strtoupper($badgeVisiteur->etablissementActuel),
                        "niveauEtude" => (int)$badgeVisiteur->niveauEtudes,
                        "orientationetudSup" => $badgeVisiteur->orientationetudSup,
                        "domaineExpePro" => ucfirst($badgeVisiteur->domaineExpePro),
                        "experiencePro" => ucfirst($experiencePro)
                    ];
                }
                else{
                    $dataEmail = [
                        "visiteurID" => $visiteur->visiteurID,
                        "nomVisiteur" => ucwords($badgeVisiteur->nomVisiteur." ".$badgeVisiteur->prenomVisiteur),
                        "emailVisiteur" => $badgeVisiteur->emailVisiteur,
                        "numeroVisiteur" => $badgeVisiteur->numTelVisiteur,
                        "affilliation" => $badgeVisiteur->affilliation,
                        "isForMe" =>false,
                        "isBac" => $isBac,
                        "anneeBac" => $badgeVisiteur->anneeBac,
                        "typeBac" => ucwords($badgeVisiteur->typeBac),
                        "etablissementActuel" => strtoupper($badgeVisiteur->etablissementActuel),
                        "niveauEtude" => (int)$badgeVisiteur->niveauEtudes,
                        "orientationetudSup" => $badgeVisiteur->orientationetudSup,
                        "domaineExpePro" => ucfirst($badgeVisiteur->domaineExpePro),
                        "experiencePro" => ucfirst($experiencePro)
                    ];
                }

                //On envoie le mail
                $registermail = new sendBadge($dataEmail);

                // return new sendBadge($dataEmail)
                //Envoie du mail avec le visiteur en copie caché
                \Illuminate\Support\Facades\Mail::to($etablissement->email_etabli)
                    ->cc($visiteur->emailVisiteur)
                    ->send($registermail);

                return json_encode(array('type' =>'ok', 'message' =>'Badge envoyé avec succès'));
            }
            else
            {
                return json_encode(array('type' =>'error_visiteur', 'message' =>'Erreur identifiant Visiteur veullez contacter l\'administrateur '));
            }

        }
        else
        {
            return json_encode(array('type' =>'error_ecole', 'message' =>'Erreur identifiant Etablissement veullez contacter l\'administrateur '));
        }


    }



    /**
     * demanderRDV
     *
     * @param  mixed $request
     * @param  mixed $id
     * @param  mixed $date
     * @return void
     */
    public function demanderRDV(Request $request, $secret_id)
    {
       //On déchiffre l'id
       $id = \Illuminate\Support\Facades\Crypt::decryptString($secret_id);

       //Obtenir l'email de l'etablissement concernée
       $etablissement = \App\Etablissements::where('etablissementID', $request->input('idEcole'))->first();

       if(isset($etablissement))
       {
           //On récupère les infos users
           $visiteur = \App\Visiteurs::where('visiteurID', $id)->first();

           //On vérifie si le visiteur existe
           if(isset($visiteur))
           {
               //On récupère le badge visiteur
               $badgeVisiteur = \App\Badgevisiteurs::where('visiteurID', $id)->first();

               $isBac = is_null($badgeVisiteur->anneeBac) ? false : true ;
               $experiencePro = is_null($badgeVisiteur->experiencePro) ? "" : $badgeVisiteur->experiencePro;

               if($badgeVisiteur->isForMe)
               {
                   $dataEmail = [
                       "visiteurID" => $visiteur->visiteurID,
                       "nomVisiteur" => ucwords($visiteur->nomVisiteur." ".$visiteur->prenomVisiteur),
                       "emailVisiteur" => $visiteur->emailVisiteur,
                       "numeroVisiteur" => $badgeVisiteur->numTelVisiteur,
                       "isForMe" =>true,
                       "isBac" => $isBac,
                       "anneeBac" => $badgeVisiteur->anneeBac,
                       "typeBac" => ucwords($badgeVisiteur->typeBac),
                       "etablissementActuel" => strtoupper($badgeVisiteur->etablissementActuel),
                       "niveauEtude" => (int)$badgeVisiteur->niveauEtudes,
                       "orientationetudSup" => $badgeVisiteur->orientationetudSup,
                       "domaineExpePro" => ucfirst($badgeVisiteur->domaineExpePro),
                       "experiencePro" => ucfirst($experiencePro),
                       "dateRDV" => $request->input('dateRDV')
                   ];
               }
               else{
                   $dataEmail = [
                       "visiteurID" => $visiteur->visiteurID,
                       "nomVisiteur" => ucwords($badgeVisiteur->nomVisiteur." ".$badgeVisiteur->prenomVisiteur),
                       "emailVisiteur" => $badgeVisiteur->emailVisiteur,
                       "numeroVisiteur" => $badgeVisiteur->numTelVisiteur,
                       "affilliation" => $badgeVisiteur->affilliation,
                       "isForMe" =>false,
                       "isBac" => $isBac,
                       "anneeBac" => $badgeVisiteur->anneeBac,
                       "typeBac" => ucwords($badgeVisiteur->typeBac),
                       "etablissementActuel" => strtoupper($badgeVisiteur->etablissementActuel),
                       "niveauEtude" => (int)$badgeVisiteur->niveauEtudes,
                       "orientationetudSup" => $badgeVisiteur->orientationetudSup,
                       "domaineExpePro" => ucfirst($badgeVisiteur->domaineExpePro),
                       "experiencePro" => ucfirst($experiencePro),
                       "dateRDV" => $request->input('dateRDV')
                   ];
               }

               //On envoie le mail
               $registermail = new askRdv($dataEmail);

               //Envoie du mail avec le visiteur en copie caché
               \Illuminate\Support\Facades\Mail::to($etablissement->email_etabli)
                   ->cc($visiteur->emailVisiteur)
                   ->send($registermail);

               return json_encode(array('type' =>'ok', 'message' =>'Demande de RDV effecruée '));
           }
           else
           {
               return json_encode(array('type' =>'error_visiteur', 'message' =>'Erreur identifiant Visiteur veullez contacter l\'administrateur '));
           }

       }
       else
       {
           return json_encode(array('type' =>'error_ecole', 'message' =>'Erreur identifiant Etablissement veullez contacter l\'administrateur '));
       }
    }


    /**
     * envoyerToAdr
     *
     * @param  mixed $request
     * @return void
     */
    public function envoyerToAdr(Request $request)
    {

    }
}
