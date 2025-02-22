<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\RouteController@lesdirections')->name('dashboard');
});
//LES REDIRECTIONS DEBUT
    Route::get('/redirects', 'App\Http\Controllers\RouteController@lesdirections');
    Route::get('/adminaccueils', 'App\Http\Controllers\RouteController@adminacceuil')->name("HomeAdmin");
    Route::get('/restorantacceuil', 'App\Http\Controllers\RouteController@restorantacceuil')->name("HomeSite");
// LES REDIRECTIONS FIN
//ADMN DEBT
    // USERS DEBUT
        Route::get('user', 'App\Http\Controllers\UserController@index');
        Route::get('usercorbeille', 'App\Http\Controllers\UserController@indexCorbeille');
        Route::post('ajouterUser', 'App\Http\Controllers\UserController@store')->name('ajouterUser');
        Route::post('modifierUser', 'App\Http\Controllers\UserController@update')->name('modifierUser');
        Route::post('supprimerUser', 'App\Http\Controllers\UserController@destroy')->name('supprimerUser');
        Route::post('corbeilleUser', 'App\Http\Controllers\UserController@corbeille')->name('corbeilleUser');
        Route::post('recupUser', 'App\Http\Controllers\UserController@recup_corbeille')->name('recupUser');
        Route::get('deleteAlluser', 'App\Http\Controllers\UserController@delete_all');
//tout mettre en corbeille
    Route::get('corbeilleAlluser', 'App\Http\Controllers\UserController@corbeille_all')->name('corbeilleAlluser');
    Route::get('recupAlluser', 'App\Http\Controllers\UserController@recup_all')->name('recupAlluser');
// CLIENT DEBUT
    Route::get('client', 'App\Http\Controllers\UserController@indexClient');
    Route::get('clientcorbeille', 'App\Http\Controllers\UserController@indexCorbeilleClient');
    //
    Route::post('ajouterClient', 'App\Http\Controllers\UserController@storeClient')->name('ajouterClient');
    Route::post('modifierClient', 'App\Http\Controllers\UserController@updateClient')->name('modifierClient');
    //
    Route::get('recupAllclient', 'App\Http\Controllers\UserController@recup_all_Client')->name('recupAllclient');
    Route::get('corbeilleAllclient', 'App\Http\Controllers\UserController@corbeille_all_Client')->name('corbeilleAllclient');
    Route::get('deleteAllclient', 'App\Http\Controllers\UserController@delete_all_Client');
    // USERS FN
//ADMN FN
