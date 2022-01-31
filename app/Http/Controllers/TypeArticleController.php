<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeArticles as Model;

class TypeArticleController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return Model::all(['id', 'libelle as name', 'nom_fichier_img as filename']);
    }

    
        
    /**
     * get
     *
     * @param  mixed $response
     * @param  mixed $id
     * @return json
     */
    public function get(Request $request, $id=null)
    {
        $model = new Model;
        if(is_null($id)){
            $model_results = $model::all();
        }
        else{
            $model_results = $model->where('id', $id)->first();
            if(!isset($model_results))
                $model_results = [];

        }

        return response()->json($model_results);
    }
}
