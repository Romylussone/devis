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
                return view('admin.article-bret');
                break;
            case 'poig':
                //
                return view('admin.article-poig');
                break;
            case 'anse':
                //
                return view('admin.article-anse');
                break;
            case 'anselg':
                //
                return view('admin.article-anselg');
                break;
            case 'box':
                //
                return view('admin.article-box');
                break;
            case 'lami':
                //
                return view('admin.article-lami');
                break;
            default:
                //
                return view('admin.home');
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
