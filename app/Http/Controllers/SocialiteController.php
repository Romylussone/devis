<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Socialite;

use App\Visiteurs;
use App\User;
use App\Badgevisiteurs;

class SocialiteController extends Controller
{
    // Les tableaux des providers autorisés
    protected $providers = [ "google", "github", "facebook" ];


    //
     # redirection vers le provider
     public function redirect (Request $request) {

        $provider = $request->provider;

        // On vérifie si le provider est autorisé
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect(); // On redirige vers le provider
        }
        abort(404); // Si le provider n'est pas autorisé
    }


    // Callback du provider
    public function callback (Request $request) {
        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {

        	// Les informations provenant du provider
        	$data = Socialite::driver($request->provider)->stateless()->user();
            
            # Social login - register
            $email = $data->getEmail(); // L'adresse email
            $name = $data->getName(); // le nom

            # 1. On récupère l'utilisateur à partir de l'adresse email
            $user = User::where("emailVisiteur", $email)->first();
            
            # 2. Si l'utilisateur existe
            if (isset($user)) {

                // Mise à jour des informations de l'utilisateur
                $user->nomVisiteur = $name;
                
                $user->save();

            # 3. Si l'utilisateur n'existe pas, on l'enregistre
            } else {
                // Enregistrement de l'utilisateur

                $user = User::create([
                    'nomVisiteur' => $name,
                    'prenomVisiteur' => "",
                    'loginVisiteur' => $email,
                    'emailVisiteur' => $email,
                    'pwdVisiteur' => Hash::make("123@.") // On attribue un mot de passe
                    // 'password' => bcrypt("@123.") // On attribue un mot de passe
                ]);
            }

            # 4. On connecte l'utilisateur
            auth()->login($user);

            # 5. On redirige l'utilisateur vers /home
            return redirect(route('visite.hall'));

         }
         abort(404);
    }

    private function autopwd()
    {
        $nbdigit = 10 ;

        $bytes = openssl_random_pseudo_bytes($nbdigit, $defaultpwd);

        return $defaultpwd ;
    }
}
