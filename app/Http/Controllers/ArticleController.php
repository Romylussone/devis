<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{    
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
    public function afficher($type)
    {
        //
        switch($type)
        {
            case 'bret':
                //
                return view('/adminvv/article-bret');
                break;
            case 'poig':
                //
                return view('/adminvv/article-poig');
                break;
            case 'anse':
                //
                return view('/adminvv/article-anse');
                break;
            case 'anselg':
                //
                return view('/adminvv/article-anselg');
                break;
            case 'box':
                //
                return view('/adminvv/article-box');
                break;
            case 'lami':
                //
                return view('/adminvv/article-lami');
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
