<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiUser as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    function login(Request $request)
    {
        dd($request);

        $login = $request->input('login');
        $pwd = $request->input('pwd');
        
        $response = ["type" => "pwd", "message" => $login.' '.$pwd];
        return response($response, 422);
        

        # 1. On récupère l'utilisateur à partir de l'adresse email
        $user = User::where('nom', $login)->first();

        if (isset($user)) {
            if(Hash::check($pwd, $user->pwd))
            {                
                #On connecte l'administrateur
                Auth::guard('api')->login($user);

                dd($user->tokens);
                // return response(['token'=> $user->token->plainTextToken], 200);
            }
            else {
                #Le mot de passe user est incorrect
                $response = ["type" => "pwd", "message" => "Mot de passe incorrecte"];
                return response($response, 422);
            }
        }
        else {
            #le login ou l'email est introuvable
            $response = ["type" => "login", "message" => "Login incorrecte"];
            return response($response, 422);
        }
    }




     /**
     * defaulNouvellapiUser
     *
     * @return void
     */
    public function defaulNouvellapiUser()
    {
        //Si le login existe
        $user = new User;
        $inputapi_user = 'form-vuejs-client';
        $api_user = $user->where('nom', $inputapi_user)->first();
        
        if(!isset($cadmin))
        {
            $user->nom =  'form-vuejs-client';
            $user->pwd =  Hash::make('form-vuejs-client');

            
            $user->save();

            $api_user = $user->where('nom', $inputapi_user)->first();

            $token = $api_user->createToken('token-name');
        }
        else{
            $token = $api_user->createToken('token-name');
        }
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
            $this->username() => 'required', 
            'pwd' => 'required',
        ]);
    }


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->pwd;
    }
}
