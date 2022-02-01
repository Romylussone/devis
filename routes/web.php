<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SysVisiteOptionsController;
use App\Http\Controllers\VisiteController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\DemandeDevisController;
use App\Http\Controllers\ApiUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//On utilisant le controller Admin pour lancer la page d'acceuil admin, nous instancion en meme temps la classe
//Pour gérer tout ce qui se passéra dans la page Admin
Route::get(
    '/', 
    [AdminController::class, 'index']
    )->name('default.admin-home')->middleware('adminauth');


Route::post('/admin/connexion', [AdminController::class, 'connexion'])->name('admin.connexion');

Route::get(
    '/admin/', 
    [AdminController::class, 'index']
    )->name('admin-home')->middleware('adminauth');

Route::get(
    '/admin/params',
    [AdminController::class, 'params']
    )->name('admin-params')->middleware('adminauth');

   // **Route de creation de l'amdin par defaut */
    // Route::get(
    //     '/admin/generate/defaut',
    //     [AdminController::class, 'defaulNouvellAdmin']
    // );


//Login admini
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin-login');
//Logaout admini
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

//*

Route::post(
    '/admin/params',
    [AdminController::class, 'nouvelAdmin']
    )->name('admin.ajouter.admin')->middleware('adminauth');


/** 
** Admin 
** Aticles 
*/
Route::get(
    '/admin/article/{type}',
    [ArticleController::class, 'afficher']
    )->name('afficherarticle')->middleware('adminauth');


/** 
** Admin 
** Devis 
*/
Route::get(
    '/admin/devis/{periode}',
    [DevisController::class, 'afficher']
    )->name('afficherdevis')->middleware('adminauth');

//** 
Route::get(
    '/devis',
    [AdminController::class, 'demandeDevis']
    )->name('dd')
;


//Route demande de devis
Route::post(
    '/demande/devis/',
    [DemandeDevisController::class, 'demandeDevis']
)->name('demande.devis');

//Route Telecharger devis
Route::get(
    '/devis-sur-mesure/telecharger-devis/{numero_devis}/',
    [DemandeDevisController::class, 'telechargerDevis']
)->name('telecharger.devis');

//Route Telecharger devis
Route::get(
    '/devis-sur-mesure/passer-commande-devis/{numero_devis}/',
    [DemandeDevisController::class, 'telechargerDevis']
)->name('passer.cmd.devis');


//**
Route::get(
    '/testenvoiedeevis',
    [DemandeDevisController::class, 'testenvoieEmail']
);

Route::get(
    '/generateApiToken',
    [ApiUserController::class, 'defaulNouvellapiUser']
);


//Route de test
// if(env('APP_ENV') == 'local')
// {
//     Route::get('/admin/test/{n}', function ($n) {
//         $route = Route::current();
//         $param = Route::current()->parameters['n'];
    
//         $name = Route::currentRouteName();
    
//         $action = Route::currentRouteAction(); 
        
//         dump($route);
//         dump($param);
//         dump($name);
//         dump($action);
//     });
// }
