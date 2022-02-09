<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFormManagerController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {

    }
    
    
    /**
     * show
     *
     * @param  mixed $nomVue
     * @param  mixed $params
     * @return void
     */
    public function show($nomVue, $params=array())
    {
        if(!empty($params)){
            return view($nomVue)->with('params', $params);
        }
        else{
            return view($nomVue);
        }
    }
    
    /**
     * ajouterElement
     *
     * @return void
     */
    public function ajouterElement()
    {
        return view('admin.formajouterElement');
    }
    
   

    /**
     * formSacVue
     *
     * @param  mixed $request
     * @param  mixed $fonction
     * @return void
     */
    public function formSacVue(Request $request, $fonction='show', $id=null)
    {
        switch($fonction){
            case 'create':
                //                
                $model = \App\TypeArticles::where('libelle', $request->input('libelle'))->first();

                if(isset($model)){
                    //ce type de sac existe dejà
                    $response = ["type" =>"ko", "message" =>"Forme de sac existant"];
                    return response($response, 422);
                }
                else {
                    $model = new \App\TypeArticles();
                    $model->libelle = $request->input('libelle');
                    $model->statut = 'created';

                    $model->save();

                    $response = ["type" =>"ko", "message" =>"Forme de sac ajoutée avec succès"];
                    return response($response, 200);
                }
                break;
            case 'update':
                $model = \App\TypeArticles::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->libelle =  ucfirst($request->input('libelle'));
                    $model->statut =  ucfirst($request->input('statut'));

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Forme de sac modifiée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Forme de sac inexistante"];
                    return response($response, 422);
                }
                break;
            case 'delete':
                $model = \App\TypeArticles::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->statut =  'deleted';

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Forme de sac supprimée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Forme de sac inexistante"];
                    return response($response, 422);
                }
                break;
            case 'show':
                // $model = \App\TypeArticles::where('statut', '!=', 'deleted')->get();
                $model = \App\TypeArticles::all();
                return $this->show('admin.forme-sac', $model);
                break;
            default :
                //show
                $model = App\TypeArticles::all();
                return $this->show('admin.forme.sac', $model);
                break;
        }
    }
    
        
    /**
     * couleurSacVue
     *
     * @param  mixed $request
     * @param  mixed $fonction
     * @param  mixed $id
     * @return void
     */
    public function couleurSacVue(Request $request, $fonction='show', $id=null)
    {
        switch($fonction){
            case 'create':
                //                
                $model = \App\ListeCouleurs::where('libelle', $request->input('libelle'))->first();

                if(isset($model)){
                    //ce type de sac existe dejà
                    $response = ["type" =>"ko", "message" =>"Couleur de sac déjà ajoutée!"];
                    return response($response, 422);
                }
                else {
                    $model = new \App\ListeCouleurs();
                    $model->libelle = $request->input('libelle');

                    $model->save();

                    $response = ["type" =>"ko", "message" =>"Couleur de sac ajoutée avec succès!"];
                    return response($response, 200);
                }
                break;
            case 'update':
                $model = \App\ListeCouleurs::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->libelle =  ucfirst($request->input('libelle'));
                    $model->statut =  $request->input('statut');

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Couleur de sac modifiée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Couleur de sac non trouvée"];
                    return response($response, 422);
                }
                break;
            case 'delete':
                $model = \App\ListeCouleurs::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->statut =  'deleted';

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Couleur de sac supprimée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Couleur de sac non trouvée"];
                    return response($response, 422);
                }
                break;
            case 'show':
                $model = \App\ListeCouleurs::all();
                return $this->show('admin.couleur-sac', $model);
                break;
            default :
                //show
                $model = App\ListeCouleurs::all();
                return $this->show('admin.couleur.sac', $model);
                break;
        }
    }
    
        
    /**
     * tailleSacVue
     *
     * @param  mixed $request
     * @param  mixed $fonction
     * @param  mixed $id
     * @return void
     */
    public function tailleSacVue(Request $request, $fonction='show', $id=null)
    {
        switch($fonction){
            case 'create':
                //                
                $model = \App\TailleArticles::where(
                    [
                        'hauteur' => $request->input('hauteur'),
                        'largeur' => $request->input('largeur'),
                        'souflet' => $request->input('souflet'),
                    ]
                )->first();

                if(isset($model)){
                    //ce type de sac existe dejà
                    $response = ["type" =>"ko", "message" =>"Taille de sac déjà ajoutée!"];
                    return response($response, 422);
                }
                else {
                    $model = new \App\TailleArticles();
                    $model->hauteur =  $request->input('hauteur');
                    $model->largeur =  $request->input('largeur');
                    $model->souflet =  $request->input('souflet');
                    $model->libelle =  $request->input('hauteur')." x ".$request->input('hauteur')." x ".$request->input('hauteur')." (Hauteur x Largeur x Soufflet en cm) ";

                    $model->save();

                    $response = ["type" =>"ok", "message" =>"Taille de sac ajoutée avec succès!"];
                    return response($response, 200);
                }
                break;
            case 'update':
                $model = \App\TailleArticles::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->hauteur =  $request->input('hauteur');
                    $model->largeur =  $request->input('largeur');
                    $model->souflet =  $request->input('souflet');
                    $model->statut =  $request->input('statut');
                    $model->libelle =  ucfirst($request->input('libelle'));

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Taille de sac modifiée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Taille de sac non trouvée"];
                    return response($response, 422);
                }
                break;
            case 'delete':
                $model = \App\TailleArticles::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->statut =  'deleted';

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Taille de sac supprimée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Taille de sac non trouvée"];
                    return response($response, 422);
                }
                break;
            case 'show':
                $model = \App\TailleArticles::all(['id', 'Hauteur as h', 'Largeur as l', 'Souflet as s', 'libelle as lib', 'statut']);
                return $this->show('admin.taille-sac', $model);
                break;
            default :
                //show
                $model = App\TailleArticles::all();
                return $this->show('admin.taille-sac', $model);
                break;
        }
    }
    
    /**
     * qteSacVue
     *
     * @param  mixed $request
     * @param  mixed $fonction
     * @return void
     */
    public function qteSacVue(Request $request, $fonction='show', $id=null)
    {
        switch($fonction){
            case 'create':
                //                
                $model = \App\ListeQteArticle::where('qte', $request->input('qte'))->first();

                if(isset($model)){
                    //ce type de sac existe dejà
                    $response = ["type" =>"ko", "message" =>"Qte de sac existant"];
                    return response($response, 422);
                }
                else {
                    $model = new \App\ListeQteArticle();
                    $model->qte = $request->input('qte');
                    $model->libelle = number_format((int)$request->input('qte'), 0, ",", " ").' sacs';
                    // $model->statut = 'created';

                    $model->save();

                    $response = ["type" =>"ko", "message" =>"Qte de sac ajoutée avec succès"];
                    return response($response, 200);
                }
                break;
            case 'update':
                $model = \App\ListeQteArticle::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->libelle =  ucfirst($request->input('libelle'));
                    $model->qte =  $request->input('qte');

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Qte de sac modifiée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Qte de sac inexistante"];
                    return response($response, 422);
                }
                break;
            // case 'delete':
            //     $model = \App\ListeQteArticle::where('id', $id)->first();

            //     if(isset($model)){
            //         //on modifie
            //         $model->statut =  'deleted';

            //         $model->save();
            //         $response = ["type" =>"ok", "message" =>"Qte de sac supprimée avec succès"];
            //         return response($response, 200);
            //     }
            //     else {
            //         $response = ["type" =>"ko", "message" =>"Qte de sac inexistante"];
            //         return response($response, 422);
            //     }
            //     break;
            case 'show':
                // $model = \App\TypeArticles::where('statut', '!=', 'deleted')->get();
                $model = \App\ListeQteArticle::all();
                return $this->show('admin.qte-sac', $model);
                break;
            default :
                //show
                $model = App\ListeQteArticle::all();
                return $this->show('admin.qte-sac', $model);
                break;
        }
    }
    
    /**
     * grammageSacVue
     *
     * @param  mixed $request
     * @param  mixed $fonction
     * @return void
     */
    public function grammageSacVue(Request $request, $fonction='show',$id=null)
    {
        switch($fonction){
            case 'create':
                //                
                $model = \App\GrammageArticles::where('grammage', $request->input('grammage'))->first();

                if(isset($model)){
                    //ce type de sac existe dejà
                    $response = ["type" =>"ko", "message" =>"Grammage de sac existant"];
                    return response($response, 422);
                }
                else {
                    $model = new \App\GrammageArticles();
                    $model->grammage = $request->input('grammage');
                    $model->libelle = $request->input('libelle');
                    $model->statut = 'created';

                    $model->save();

                    $response = ["type" =>"ko", "message" =>"Grammage de sac ajoutée avec succès"];
                    return response($response, 200);
                }
                break;
            case 'update':
                $model = \App\GrammageArticles::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->grammage =  $request->input('grammage');
                    $model->libelle =  ucfirst($request->input('libelle'));
                    $model->statut =  ucfirst($request->input('statut'));

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Grammage de sac modifiée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Grammage de sac inexistante"];
                    return response($response, 422);
                }
                break;
            case 'delete':
                $model = \App\GrammageArticles::where('id', $id)->first();

                if(isset($model)){
                    //on modifie
                    $model->statut =  'deleted';

                    $model->save();
                    $response = ["type" =>"ok", "message" =>"Qte de sac supprimée avec succès"];
                    return response($response, 200);
                }
                else {
                    $response = ["type" =>"ko", "message" =>"Qte de sac inexistante"];
                    return response($response, 422);
                }
                break;
            case 'show':
                // $model = \App\TypeArticles::where('statut', '!=', 'deleted')->get();
                $model = \App\GrammageArticles::all();
                return $this->show('admin.grammage-sac', $model);
                break;
            default :
                //show
                $model = App\GrammageArticles::all();
                return $this->show('admin.grammage-sac', $model);
                break;
        }
    }
    
    /**
     * tailleAnseSacVue
     *
     * @param  mixed $request
     * @param  mixed $fonction
     * @return void
     */
    public function tailleAnseSacVue(Request $request, $fonction='show')
    {
        switch($fonction){
            case 'create':
                break;
            case 'update':
                break;
            case 'delete':
                break;
            case 'show':
                break;
            default :
                //show
                $this->
                break;
        }
    }


}
