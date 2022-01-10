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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function () {
//     return view('/admin/home');
// })->name('admin-home');


//On utilisant le controller Admin pour lancer la page d'acceuil admin, nous instancion en meme temps la classe
//Pour gérer tout ce qui se passéra dans la page Admin
Route::get(
    '/', 
    [AdminController::class, 'index']
    )->name('admin-home')->middleware('adminauth');


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

// Route::get('/admin/deconnexion', [AdminController::class, 'deconnexion'])->name('admin-logout');


//Login admini
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin-login');
//Logaout admini
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

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


//admin /ecole
// Route::get(
//     '/admin/ajouter-ecole',
//     [EcoleController::class, 'ajouterEcole']
//     )->name('admin-ajouter-ecole')->middleware('adminauth');

Route::get(
    '/admin/gerer-ecole', 
    [EcoleController::class, 'gererEcole']
    )->name('admin-gerer-ecole')->middleware('adminauth');

Route::get(
    '/admin/stats-ecole',
    [EcoleController::class, 'statsEcole']
    )->name('admin-stats-ecole')->middleware('adminauth');

Route::get(
    '/dd',
    [AdminController::class, 'demandeDevis']
    )->name('dd')
;


//admin /POST ecole : Pour appel ajax
//admin : Ajouter nouvel ecole
Route::post('/admin/ecole/ajouter-ecole', [AdminController::class, 'ajouterEcole'])->name('admin.ajouter.nouvel.ecole');

//admin : gérer ecole (maj ou del ete)
Route::post('/admin/ecole/gerer-ecole/update', [AdminController::class, 'updateEcole'])->name('gerer.ecole.update');
Route::post('/admin/ecole/gerer-ecole/delete', [AdminController::class, 'deleteEcole'])->name('gerer.ecole.delete');

//Admin : new admin
Route::post('/admin/ajouter/nouvel-admin', [AdminController::class, 'nouvelAdmin'])->name('admin.ajouter.admin');

//get stats ecoles : pour obtenir les stats de visites par ecoles
Route::post('/admin/stats/get', [AdminController::class, 'getStatEcol'])->name('admin.ecol.stats');


// Route::get('/', function () {
//     return view('/front/home');
// })->name('front-home');
// Route::get('/', [HomeController::class, 'index'])->name('front-home');
 
Route::get('/visite-hall', [HomeController::class, 'visiteHall'])->name('visite.hall');

/**
 * Ajax call
 * Ces routes serons appelée par ajax pendant l'inscription de l'utisateur
 */
//Route d'appel ajax pour la vérification de l'adr email dans le système
Route::post('/mailexist', [RegisterController::class, 'emaileExist'])->name('mailcheck');

//Route appelé par ajax pour l'envoie du lien signé de confirmation d'email
Route::post('/inscription/sendcemail-link', [RegisterController::class, 'sendVerifEmail'])->name('sendcemailLink');

//Inscription et enregistrement des new users dans la DB
Route::post('/inscription/save', [RegisterController::class, 'save'])->name('save');

//Route signé pour la validation d'adresse email
//Cette route est accessible uniquement par lien signé généré automatiquement lors de l'inscription de l'utilisateur
Route::get('/inscription/validation-adr-email/{visiteur_id}', 
    [RegisterController::class, 'confirmEmail']
    )->name('validation.email');

//Création de badge
Route::post('/inscription/cbadge/{isforme}', [RegisterController::class, 'createBadge'])->where('isforme', '[0-1]+');


//Route pour le chargement des ecoles de la DB par ajax
Route::get(
    '/home/charger/ecoles/{getAll}',
    [EcoleController::class, 'chargerEcole'])
    ->name('charger.ecole')
    ->where('getAll', '[0,1]+');
;

#Tracer les visites users et leurs actions 
#
//Route pour par ajax
Route::post(
    '/visite/trace/start',
    [VisiteController::class, 'traceStart'])
    ->name('trace.visite.start')
;

//Route pour appelpar ajax
Route::post(
    '/visite/trace/action/visiteurs',
    [VisiteController::class, 'actionsVisiteurs'])
    ->name('trace.actions.visiteurs')
;

# Socialite URLs

// La redirection vers le provider
Route::get("redirect/{provider}", "SocialiteController@redirect")->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", "SocialiteController@callback")->name('socialite.callback');


Auth::routes(['verify' => true]);


//Pour tester et visualiser le contenu de mon mailers

// Route::get('/envoie-badge', function () {
//     return new App\Mail\SysRegisterMail(array('email'=>'test.code@virtualex.ma', 'code' =>$emailcheck_link));
// });

//Route pour tester les emails à envoyer
// Route::get('/tmail', 'RegisterController@tmail');

//Vue à afficher pendant la confirmation du mail
Route::get(
    '/confirmation-email/login', 
    [HomeController::class, 'afterEmailValidation']
)->name('emailok')->middleware('isauthtoaccess');

//Vue à afficher en attente de confirmation d'adresse email
Route::get(
    '/confirmation-email/wait/email/validation/{secret}/{id}',
    [HomeController::class, 'waitEmailValidation']
)->name('wait.email.validation');

//Route pour l'envoie d'emails via les btn d'option de visite
//Route envoiyer mon badge
Route::post(
    '/envoyer/badge/{secret_id}', 
    [SysVisiteOptionsController::class, 'envoyerBadge']
)->name('envoyer.email.badge');

//Route demande de RDV
Route::post(
    '/envoyer/demande/rdv/{secret_id}/',
    [SysVisiteOptionsController::class, 'demanderRDV']
)->name('envoyer.email.rdv');

Route::post(
    '/envoyer/email/to/adr/{secret}',
    [SysVisiteOptionsController::class, 'envoyerToAdr']
)->name('envoyer.email.to.adr');


//Route de test
if(env('APP_ENV') == 'local')
{
    Route::get('/admin/test/{n}', function ($n) {
        $route = Route::current();
        $param = Route::current()->parameters['n'];
    
        $name = Route::currentRouteName();
    
        $action = Route::currentRouteAction(); 
        
        dump($route);
        dump($param);
        dump($name);
        dump($action);
    });
}


