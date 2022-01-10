<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Visiteurs;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //Controlleur de gestion de connexion et deconnexion user
    
    /**
     * connexion
     *
     * @return void
     */
    public function connexion(Request $request)
    {
        $login = $request->input('login');
        $pwd = $request->input('pwd');
        
        # 1. On récupère l'utilisateur à partir de l'adresse email
        $visiteur = User::where("loginVisiteur", $login)->first();

        if (isset($visiteur)) {
            if(Hash::check($pwd, $visiteur->pwdVisiteur))
            {
                #L'utilisateur a saisie le bon mot de passe
                // $token = $visiteur->createToken('Laravel Password Grant Client')->accessToken;
                // $response = ['token' => $token];
                
                #On connecte l'utilisateur
                auth()->login($visiteur);

                return json_encode( array('url'=> url('/visite-hall')));
                // return response($response, 200);
            }
            else {
                //Le mot de passe user est incorrect
                $response = ["type" => "pwd", "message" => "Mot de passe incorrecte"];
                return response($response, 422);
            }
        }
        else {
            //le login ou l'email est introuvable
            $response = ["type" => "login", "message" => "Email incorrecte"];
            return response($response, 422);
        }
    }

    
    /**
     * deconnexion
     *
     * @return void
     */
    public function deconnexion()
    {
        $user = Auth::user();

        auth()->logout($user);

        return redirect(route('front-home'));
    }
        
    /**
     * validateLogin
     *
     * @param  mixed $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'pwdvisiteur' => 'required',
        ]);
    }

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
