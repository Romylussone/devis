<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etablissements as Ecole;

class EcoleController extends Controller
{
    
     /**
     * ajouterEcole
     *
     * @return void
     */
    public function ajouterEcole()
    {
        return view('/adminvv/ajouter-ecole');
    }
    
    /**
     * gererEcole
     *
     * @return void
     */
    public function gererEcole()
    {
        return view('/adminvv/gerer-ecole');
    }
    
    /**
     * statsEcole
     *
     * @return void
     */
    public function statsEcole()
    {
        return view('/adminvv/stats-ecole');
    }
    
    /**
     * chargerEcole
     *
     * @return void
     */
    public function chargerEcole(Request $request, $getAll=0)
    {
        
        if($getAll == 0){
            $ecole = new Ecole();
            $allEcoles = $ecole->where('published', true)->get();
            $listEcole = $allEcoles->toJson();
        }
        else {
            $ecole = new Ecole();
            $allEcoles = $ecole->get();
            $listEcole = $allEcoles->toJson();
        }

        return response($listEcole, 200);
        
        
    }
}
