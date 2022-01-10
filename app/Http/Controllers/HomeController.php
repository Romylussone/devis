<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('/front/home');
    }
    
    /**
     * visiteHall
     *
     * @return void
     */
    public function visiteHall(){
        return view('/front/visites/hall');
    }
    
    /**
     * waitEmailValidation
     *
     * @return void
     */
    public function waitEmailValidation($secret, $id)
    {
        $eamil = Crypt::decryptString($secret);
        return view('/front/login/wait-email-validation', ['email' =>$eamil, 'id' => $id]);
    }
    
    /**
     * afterEmailValidation
     *
     * @param  mixed $request
     * @return void
     */
    public function afterEmailValidation()
    {
        return view('/front/login/email-verification');
    }
}
