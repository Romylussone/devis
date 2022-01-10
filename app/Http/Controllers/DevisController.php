<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisController extends Controller
{
    //
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //index 
    }
    
    /**
     * ajouter
     *
     * @return void
     */
    public function ajouter()
    {
        //
    }
    
        
       
    /**
     * afficher
     *
     * @param  mixed $type
     * @return void
     */
    public function afficher($periode)
    {
        //
        switch($periode)
        {
            case 'all':
                //
                return view('/adminvv/devisall');
                break;
            case 'hebdo':
                //
                return view('/adminvv/devishebdo');
                break;
            case 'mensuel':
                //
                return view('/adminvv/devismensuel');
                break;
            case 'annuel':
                //
                return view('/adminvv/devisannuel');
                break;
            case 'template':
                //
                return view('/adminvv/devistemplate');
                break;
            default:
                //
                return view('/adminvv/home');
                break;
        }
    }
    
    /**
     * supprimer
     *
     * @return void
     */
    public function supprimer()
    {
        //
    }
    
    /**
     * modifier
     *
     * @return void
     */
    public function modifier()
    {
        //
    }
}
