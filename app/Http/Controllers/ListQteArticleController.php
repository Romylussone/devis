<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListeQteArticle as Model;

class ListQteArticleController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return Model::all(['id', 'libelle as name']);
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

        // return response()->json($model_results);
    }
}
