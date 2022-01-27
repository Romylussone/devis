<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Etablissements as Ecole;
use App\Administrateurs as Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * La methode index s'execute immédiation à l'appel du controller
     *
     * @return void
     */
    public function index(Request $request)
    {
        return view('admin.home');
    }
    
    /**
     * login : Page de connexion pour accéder à la page admin
     *
     * @return void
     */
    public function login()
    {
        return view('admin.login');
    }
        
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        //Deconnexion admin 
        auth()->guard('webadmin')->logout();

        //Redirection login page
        return redirect(route('admin-login'));
    }


    /**
     * connexion
     *
     * @param  mixed $request
     * @return void
     */
    public function connexion(Request $request)
    {
        //Connexion admin panel
        $login = $request->input('login');
        $pwd = $request->input('pwd');
        
        # 1. On récupère l'utilisateur à partir de l'adresse email
        $admin = Admin::where("login", $login)->first();

        if (isset($admin)) {
            if(Hash::check($pwd, $admin->pwd))
            {                
                #On connecte l'administrateur
                Auth::guard('webadmin')->login($admin);

                return response(['url'=> route('admin-home')], 200);
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
     * params
     *
     * @return void
     */
    public function params()
    {
        return view('admin.admin-params');
    }
    

    
    /**
     * saveFile : sauvegarde les img uploader
     *
     * @param  mixed $f
     * @param  mixed $fname
     * @return void
     */
    private function saveFile($f, $fname)
    {
        //
    }

    
    
    /**
     * nouvelAdmin
     *
     * @param  mixed $request
     * @return void
     */
    public function nouvelAdmin(Request $request)
    {
        //Si le login existe
        $admin = new Admin;
        $inputAdminlogin = $request->input('loginAdmin') ;
        $cadmin = $admin->where('login', $inputAdminlogin)->first();

        if(isset($cadmin))
        {
            //L'admin existe dejà
            $response = ["type" => "admin", "message" => "Ce login est déjà utilisé ! "];
            return response($response, 422);
        }
        else 
        {   
            // loginAdmin: inputnewAdminlogin, 
            // nomAdmin:inputnewAdminNom, 
            // prenAdmin: nputnewAdminPren, 
            // pwdAdmin: inputnewAdminPwd,
            // emailAdmin: inputnewAdminEmail
            
            //On enregistre les infos du nouvel admin
            // 'nom', 'pwd', 'email', 'login','prenoms', 'contact','contact',
            $admin->nom =  $request->input('nomAdmin');
            $admin->prenoms =  strtoupper($request->input('prenAdmin'));
            $admin->pwd =  Hash::make($request->input('pwdAdmin'));
            $admin->email =  $request->input('emailAdmin');
            $admin->login =  $request->input('loginAdmin');
                       

            //On ajoute la nouvelle admin
            $admin->save();
            $response = ["type" =>"ok", "message" =>"Admin créé avec succès"];
            return response($response, 200);
        }
    }

    
    /**
     * defaulNouvellAdmin
     *
     * @return void
     */
    public function defaulNouvellAdmin()
    {
        //Si le login existe
        $admin = new Admin;
        $inputAdminlogin = '_devisdba';
        $cadmin = $admin->where('login', $inputAdminlogin)->first();
        
        if(!isset($cadmin))
        {
            
            //On enregistre les infos du nouvel admin
            // 'nom', 'pwd', 'email', 'login','prenoms', 'contact','contact',
            $admin->nom =  'Default';
            $admin->prenoms =  strtoupper('Default');
            $admin->pwd =  Hash::make('_devisdba');
            $admin->email =  'devidba@admin.com';
            $admin->login =  '_devisdba';

            //On ajoute la nouvelle admin
            $admin->save();
            // $response = ["type" =>"ok", "message" =>"Admin créé avec succès"];
            // return response($response, 200);
            
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


    /**
     * demandeDevis : Pour tester le formulaire
     *
     * @param  mixed $request
     * @return void
     */
    public function demandeDevis(Request $request)
    {
        return view('front.forms.demande-devis');
    }

}

