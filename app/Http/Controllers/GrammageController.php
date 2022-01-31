<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrammageArticles as Model;

class GrammageController extends Controller
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
    
    /**
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request)
    {
        //
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id=null)
    {
        //
    }
    
    /**
     * delete
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function delete(Request $request, $id=null)
    {
        //
    }
}
