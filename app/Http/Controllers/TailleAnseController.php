<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TailleAnses as Model;

class TailleAnseController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return Model::all(['id', 'taille as name']);
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
