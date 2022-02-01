<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrammageController;
use App\Http\Controllers\DemandeDevisController;
use App\Http\Controllers\ListCouleurController;
use App\Http\Controllers\ListQteArticleController;
use App\Http\Controllers\SecteurActiviteController;
use App\Http\Controllers\TailleArticleController;
use App\Http\Controllers\TailleAnseController;
use App\Http\Controllers\TypeImpressionController;
use App\Http\Controllers\TypeArticleController;
use App\Http\Controllers\ApiUserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// header('Access-Control-Allow-Origin: *');

//Route demande de devis
Route::post(
    '/demande/devis/',
    [DemandeDevisController::class, 'demandeDevis']
)->name('api.demande.devis');


Route::post(
    '/login/',
    [ApiUserController::class, 'login']
)->name('api.login');

//
Route::get(
    '/grammage/get/',
    [GrammageController::class, 'index']
)->name('grammage.get');

Route::get(
    '/taille-article/get/',
    [TailleArticleController::class, 'index']
)->name('taiile.article.get');


Route::get(
    '/type-article/get/',
    [TypeArticleController::class, 'index']
)->name('type.article.get');


Route::get(
    '/list-qte-article/get/',
    [ListQteArticleController::class, 'index']
)->name('list.qte.article.get');

Route::get(
    '/type-impression-article/get/',
    [TypeImpressionController::class, 'index']
)->name('type.impression.article.get');

Route::get(
    '/secteur-activite-entreprise/get/',
    [SecteurActiviteController::class, 'index']
)->name('secteur.activite.ets.get');

Route::get(
    '/taiile-anse/get/',
    [TailleAnseController::class, 'index']
)->name('taille.anse.get');

Route::get(
    '/colors-article/get/',
    [ListCouleurController::class, 'index']
)->name('color.article.get');
