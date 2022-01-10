<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class IsAuthToAcessView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //On récupère les infos de signature flash stoqué dans l'objet request après la confirmatin d'email
        $code = $request->old('code');

        //On verifie si isauthtoacessview est à true, si la variable de config n'existe pas on recupère la valeur par defaut : false
        if(Hash::check('2077', $code))
        {
            return $next($request);
        }
        else{
            return redirect(route('front-home'));
        }
    }
}
