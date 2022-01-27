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
                return view('/admin/devisall');
                break;
            case 'hebdo':
                //
                return view('/admin/devishebdo');
                break;
            case 'mensuel':
                //
                return view('/admin/devismensuel');
                break;
            case 'annuel':
                //
                return view('/admin/devisannuel');
                break;
            case 'template':
                //
                return view('/admin/devistemplate');
                break;
            default:
                //
                return view('/admin/home');
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
