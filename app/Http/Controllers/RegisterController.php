<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\SysRegisterMail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Visiteurs;

class RegisterController extends Controller
{
    //

     /**
     * inscription
     *
     * Gérer l'inscription des visiteurs
     * @return void
     */
    public function save(Request $request)
    {
        //Nouvelle instance de visiteur
        $visiteur = new \App\Visiteurs;
        $inputEmail = $request->input('email') ;
        $cmail = $visiteur->where('emailVisiteur', $inputEmail)->first();

        //On vérifie si l'adr email existe déjà ou passwordi
        if(isset($cmail))
        {
            //Cette adresse mail existe dejà 
            $response = ["type" => "email", "message" => "Cette adresse email existe déjà! "];
            return response($response, 422);

        }
        else {
        
            $visiteur->nomVisiteur =  $request->input('nom');
            $visiteur->prenomVisiteur =  $request->input('pren');
            $visiteur->loginVisiteur =  $inputEmail;
            $visiteur->emailVisiteur =  $inputEmail;
            $visiteur->pwdVisiteur = Hash::make("123@.");

            // $visiteur->pwdVisiteur = Hash::make(autopwd());
            $visiteur->save();

            //On génère le lien signé pour la redirection de l'utilisateur sur la page d'attente de validation d'email
            $wait_email_valid_url =  URL::signedRoute(
                'wait.email.validation', 
                ['secret' => Crypt::encryptString($inputEmail), 'id' =>$visiteur->visiteurID ]
            );

            $reponse = array(
                'visiteurID' => $visiteur->visiteurID, 
                'url' =>route('sendcemailLink'),
                'urlwait' =>$wait_email_valid_url,
                'message' =>"Nouvel utilisateur ajouté"
            );
            
            return json_encode($reponse);
        }
    }

    

    /**
     * createBadge
     *
     * @return void
     */
    public function createBadge(Request $request, $isforme)
    {
        //Nouvelle instance du model Badgevisiteurs
        $badge = new \App\Badgevisiteurs;

        //Si isforme=true ou 1  alors on créé le badge pour la personne qui visite
        if($isforme == 1 || $isforme == "1" )
        {   
            //On vérifie si l'utisateur a le BAC ou non
            if($request->input('isbac') == "true")
            {
                //Si l'user a le bac
                $badge->isForMe =  $isforme;
                // $badge->affilliation =  $request->input('affilliation');
                // $badge->nomVisiteur =  $request->input('nomPersonneConcern');
                // $badge->prenomVisiteur =  $request->input('prenPersonneConcern');
                // $badge->numTelVisiteur =  $request->input('numerotelVisiteurParent');
                $badge->numTelVisiteur =  $request->input('numeroVisiteur');
                $badge->niveauEtudes =  $request->input('niveauEtudSup');
                $badge->anneeBac =  $request->input('anneeBac');
                $badge->typeBac =  $request->input('typeBacVisiteur');
                // $badge->etablissementActuel = $request->input('etablisementActuelVisiteur');            
                // $badge->orientationetudSup = $request->input('orientationEtudSupVisi');
                $badge->experiencePro = $request->input('experiencePro');
                $badge->domaineExpePro = $request->input('domaineExpepro');
                $badge->visiteurID = $request->input('visiteuID');
            }
            else {
                //Si l'utilisateur n'a pas le bac
                $badge->isForMe =  $isforme;
                // $badge->affilliation =  $request->input('affilliation');
                // $badge->nomVisiteur =  $request->input('nomPersonneConcern');
                // $badge->prenomVisiteur =  $request->input('prenPersonneConcern');
                // $badge->numTelVisiteur =  $request->input('numerotelVisiteurParent');
                $badge->numTelVisiteur =  $request->input('numeroVisiteur');
                $badge->niveauEtudes =  $request->input('niveauScolaire');
                // $badge->anneeBac =  $request->input('anneeBac');
                // $badge->typeBac =  $request->input('typeBacVisiteur');
                $badge->etablissementActuel = $request->input('etablisementActuelVisiteur');        
                $badge->orientationetudSup = $request->input('orientationEtudSupVisi');
                // $badge->experiencePro = $request->input('experiencePro');
                // $badge->domaineExpePro = "";
                $badge->visiteurID = $request->input('visiteuID');
            }

        }
        else {
            //On créé le badge avec les données fournis par le parent du visiteur

            if($request->input('isbac') == "true" )
            {
                //Si l'user a le bac
                $badge->isForMe = true;
                $badge->affilliation =  $request->input('affilliation');
                $badge->nomVisiteur =  $request->input('nomPersonneConcern');
                $badge->prenomVisiteur =  $request->input('prenPersonneConcern');
                $badge->numTelVisiteur =  $request->input('numerotelVisiteurParent');
                // $badge->numTelVisiteur =  $request->input('numeroVisiteur');
                // $badge->niveauEtudes =  $request->input('niveauScolaire');
                $badge->anneeBac =  $request->input('anneeBac');
                $badge->typeBac =  $request->input('typeBacVisiteur');
                // $badge->etablissementActuel = $request->input('etablisementActuelVisiteur');            
                // $badge->orientationetudSup = $request->input('orientationEtudSupVisi');
                $badge->experiencePro = $request->input('experiencePro');
                $badge->domaineExpePro = $request->input('domaineExpepro');
                $badge->visiteurID = $request->input('visiteuID');
            }
            else {
                //Si l'utilisateur n'a pas le bac
                $badge->isForMe =  false;
                $badge->affilliation =  $request->input('affilliation');
                $badge->nomVisiteur =  $request->input('nomPersonneConcern');
                $badge->prenomVisiteur =  $request->input('prenPersonneConcern');
                $badge->numTelVisiteur =  $request->input('numerotelVisiteurParent');
                // $badge->numTelVisiteur =  $request->input('numeroVisiteur');
                $badge->niveauEtudes =  $request->input('niveauScolaire');
                // $badge->anneeBac =  $request->input('anneeBac');
                // $badge->typeBac =  $request->input('typeBacVisiteur');
                $badge->etablissementActuel = $request->input('etablisementActuelVisiteur');        
                $badge->orientationetudSup = $request->input('orientationEtudSupVisi');
                // $badge->experiencePro = $request->input('experiencePro');
                // $badge->domaineExpePro = "";
                $badge->visiteurID = $request->input('visiteuID');
            }
        }

        //On sauvegarde les données
        $badge->save();

        //Retourner la reponse 
        $reponse = array('badgeID' => $badge->badgeID, 'msg' =>"Badge créer");
        return json_encode($reponse);
    }

    /**
     * sendVerifEmail : Envoie un lien signé de valdiation d'adresse email à l'adresse fournir
     *
     * @param  mixed $request
     * @return void
     */
    public function sendVerifEmail(Request $request)
    {
        $mailverifyer = new \App\Verificationemail;

        $email = $request->input('email');
        
        //On génère le lien signé pour la validation de l'adresse email
        $emailcheck_link =  URL::temporarySignedRoute(
            'validation.email',
            now()->addMinutes(30), ['visiteur_id' => $request->input('id')]
        );
        
        //On envoie le mail
        $registermail = new SysRegisterMail(['email' => $email, 'code' =>$emailcheck_link]);

        \Illuminate\Support\Facades\Mail::to($email)->send($registermail);
        
        return json_encode(array('type' =>'ok', 'message' =>'lien de validation transmit par mail'));
    }
        
       
    /**
     * confimEmail : Action lors de la confirmation d'email par click sur le lien signé de confirmation d'adrese email
     * envoyé à l'utilisateur 
     *
     * @param  mixed $request
     * @param  mixed $visiteur_id
     * @return void
     */
    public function confirmEmail(Request $request, $visiteur_id)
    {
        // dd($request);
        //On vérifie si le lien est signé 
        if (! $request->hasValidSignature()) {
            //Line non signé rediriger vers la page d'accueil
            return redirect(route('front-home'));
        }else{
            //Lien signé : on valide l'inscription de l'utilisateur

            //Nouvelle instance de visiteur
            $visiteur = \App\Visiteurs::where('visiteurID', $visiteur_id)->first();

            if(isset($visiteur))
            {
                $visiteur->email_verified_at = now();

                //On fait la maj 
                $visiteur->save();

                #On connecte l'utilisateur
                auth()->login($visiteur);
                
                //On redirige l'utilisateur pour rentrer dans la visite
                return redirect(route('emailok'))->withInput(
                    [
                        'signature' => 'email signed', 
                        'code' =>Hash::make('2077')
                    ] );
            }
            else {
                //Utilisateur non trouvé
                abort(404); 
            }
            
        }
    }
    
    /**
     * emaileExist : Vérifie si l'adresse email saisie par le client est valide pour le système.
     * Une adr email est valide lorsqu'elle est unique, qu'elle n'existe pas dejà dans la BDD
     *
     * @param  mixed $request
     * @return void
     */
    public function emaileExist(Request $request)
    {
        $email = \App\Visiteurs::where('emailVisiteur', $request->input('email'))->first();
        if(isset($email)){
            return response(array('type' =>'emailexist', 'message' => 'Cette adresse email est déjà utilisée !'), 422);
        }
        else{
            return json_encode(array('type' =>'ok', 'message' =>'adresse email valid'));
        }
    }

    /**
     * autopwd
     *
     * @return void
     */
    private function autopwd()
    {
        $nbdigit = 10 ;

        $bytes = openssl_random_pseudo_bytes($nbdigit, $defaultpwd);

        return $defaultpwd ;
    }
    
    /**
     * autopwd
     *
     * @return int
     */
    private function genCode()
    {
        return random_int(1324, 97989);
    }
    
    /**
     * tmail pour test la vue de l'email
     *
     * @return void
     */
    // public function tmail(){
    //     //On génère le lien signé pour la validation de l'adresse email
    //     $emailcheck_link =  URL::temporarySignedRoute(
    //         'validation.email', now()->addMinutes(30), ['visiteur_id' => 1]
    //     );

    //     //On envoie le mail
    //     return new SysRegisterMail(array('email'=>'tmail@mail.com', 'code' =>$emailcheck_link));
    // }
}
