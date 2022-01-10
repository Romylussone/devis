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
        return view('/adminvv/home');
    }
    
    /**
     * login : Page de connexion pour accéder à la page admin
     *
     * @return void
     */
    public function login()
    {
        return view('/adminvv/login');
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
        return view('/adminvv/admin-params');
    }
    
    /**
     * ajouterEcole
     *
     * @param  mixed $request
     * @return void
     */
    public function ajouterEcole(Request $request)
    {   
        //On spécifie les champs obligatoire
        request()->validate([
            'imghomeEcole'  => 'required|mimes:png,jpeg,jpg|max:115000',
            'nom'  => 'required',
            'nomComplet'  => 'required',
            'emailEcole'  => 'required',
            'liensiteweb'  => 'required',
            'lienvv'  => 'required',
            'fbpageid'  => 'required',
            'lienVideo'  => 'required',
        ]);

        //Nouvelle instance de ecole
        $ecole = new Ecole;
        $inputemailEcole = $request->input('emailEcole') ;
        $cmail = $ecole->where('email_etabli', $inputemailEcole)->first();

        //On vérifie si l'ecole existe dejà
        if(isset($cmail))
        {
            //Cette ecole existe dejà 
            $response = ["type" => "ecole", "message" => "Cette ecole existe déjà! "];
            return response($response, 422);
        }
        else
        {
            //Ajouter l'ecole
            // dd($request->file('imghomeEcole'));
            $fname = strtolower($request->input('nom')."_bg").".".$request->file('imghomeEcole')->extension();
            $pathF = $this->saveFile($request->file('imghomeEcole'), $fname);

            // 'nomEtabli', 'sitewebEtabli', 'lienVisiteEtabli', 'lienVideo','fb_page_id', 'email_etabli',cheminImghome
            $ecole->nomEtabli =  strtoupper($request->input('nom'));
            $ecole->nomCompletEtabli =  ucfirst($request->input('nomComplet'));
            $ecole->sitewebEtabli =  $request->input('liensiteweb');
            $ecole->lienVisiteEtabli =  $request->input('lienvv');
            $ecole->lienVideo =  $request->input('lienVideo');
            $ecole->fb_page_id =  $request->input('fbpageid');
            $ecole->email_etabli =  $request->input('emailEcole');
            $ecole->cheminImghome =  $pathF;

            //On ajoute la nouvelle ecole
            $ecole->save();
            $response = ["type" =>"ok", "message" =>"Ecole ajoutée avec succès"];
            return response($response, 200);

        }
    }
    
    /**
     * gererEcole
     *
     * @param  mixed $request
     * @return void
     */
    public function gererEcole(Request $request)
    {
        
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
        $fname = str_replace(' ', '_', trim($fname)) ;

        $path = $f->storeAs('ecole', $fname);
        if(isset($path))
        {
            //On déplace l'img vers le dossier des img de l'ecole
            $tf = storage_path('app/ecole/'.$fname);
            $newf = public_path('/img/ecole/'.$fname);

            rename($tf, $newf);

            $path = '/img/ecole/'.$fname ;
        }

        return $path ;

    }

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
     * updateEcole : Mise à jout des infos d'une ecole
     *
     * @param  mixed $request
     * @return void
     */
    public function updateEcole(Request $request)
    {
        
        //Nouvelle instance de ecole
        $ecole = new Ecole;
        $ecoleID = $request->input('ecoleID') ;
        $imgMaj = $request->input('imgMaj') ;

        $cid = $ecole->where('etablissementID', $ecoleID)->first();

        //On vérifie si l'ecole existe dejà
        if(isset($cid))
        {
            //Mise à jour de l'ecole

            //On vérifie si l'img à été changée ou pas
            if($imgMaj == "true")
            {
                $fname = strtolower($request->input('nom')."_bg").".".$request->file('imghomeEcole')->extension();
                $pathF = $this->saveFile($request->file('imghomeEcole'), $fname);
                // $ecole->cheminImghome =  $pathF;
                $valuesUpdate = [
                    'nomEtabli' =>  strtoupper($request->input('nom')),
                    'nomCompletEtabli' =>  ucfirst($request->input('nomComplet')),
                    'sitewebEtabli' =>  $request->input('liensiteweb'),
                    'lienVisiteEtabli' =>  $request->input('lienvv'),
                    'lienVideo' =>  $request->input('lienVideo'),
                    'fb_page_id' =>  $request->input('fbpageid'),
                    'email_etabli' =>  $request->input('emailEcole'),
                    'cheminImghome' => $pathF
                ];
            }
            else {
                $valuesUpdate = [
                    'nomEtabli' =>  strtoupper($request->input('nom')),
                    'nomCompletEtabli' =>  ucfirst($request->input('nomComplet')),
                    'sitewebEtabli' =>  $request->input('liensiteweb'),
                    'lienVisiteEtabli' =>  $request->input('lienvv'),
                    'lienVideo' =>  $request->input('lienVideo'),
                    'fb_page_id' =>  $request->input('fbpageid'),
                    'email_etabli' =>  $request->input('emailEcole')
                ];
            }
            

            //On lance la maj de l'ecole
            $ecole->where('etablissementID', $ecoleID)->update($valuesUpdate);

            $response = ["type" =>"ok", "message" =>"Ecole mise à jour avec succès"];

            return response($response, 200);            
            
        }
        else
        {
            $response = ["type" => "ecole", "message" => "Cette ecole n'existe pas! "];
            return response($response, 422);
        }
    }
    
    
    /**
     * deleteEcole :  Supprimer une ecole
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteEcole(Request $request)
    {
        //Nouvelle instance de ecole
        $ecole = new Ecole;
        $id = $request->input('id') ;
        $ecoleTodel = $ecole->where('etablissementID', $id)->first();

        if(isset($ecoleTodel)){
            $ecoleTodel->delete();

            $response = ["type" => "ecole", "message" => "Ecole supprimée avec succès! "];
            return response($response, 200);
        }
        else
        {
            $response = ["type" => "ecole", "message" => "Ecole non trouvée ! "];
            return response($response, 422);
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
     * getStatEcol : Pour charger les stas de toutes les ecoles
     *
     * @param  mixed $request
     * @return void
     */
    public function getStatEcol(Request $request)
    {
        $nb_vvParEcol = DB::select('');
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
        return view('/front/forms/demande-devis');
    }

}

