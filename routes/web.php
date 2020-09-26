<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){

    Route::resource('users','UsersController');

});


Route::namespace('Agent')->prefix('agent')->name('agent.')->group(function(){

    Route::resource('agents','AgentsController');
    Route::get('/pasteurs','AgentsController@pasteurs')->name('agents.pasteurs');
    Route::get('/Catéchistes','AgentsController@Catéchistes')->name('agents.Catéchistes');
    Route::get('/valides','AgentsController@valides')->name('agents.valides');
    Route::get('/invalides','AgentsController@invalides')->name('agents.invalides');
    Route::get('/retraités','AgentsController@retraités')->name('agents.retraités');
    Route::get('/decedes','AgentsController@decedes')->name('agents.decedes');
    Route::get('/search','AgentsController@search')->name('search');
    Route::get('/searchPasteur','AgentsController@searchPasteur')->name('searchPasteur');
    Route::get('/searchCatechiste','AgentsController@searchCatechiste')->name('searchCatechiste');

});


Route::namespace('Etat')->prefix('etat')->name('etat.')->group(function(){

    Route::resource('etats','EtatsController');

});


Route::namespace('Conjoint')->prefix('conjoint')->name('conjoint.')->group(function(){

    Route::resource('conjoint','ConjointController');
    Route::get('/decedes','ConjointController@decedes')->name('conjoints.decedes');
    Route::get('conjoint/create/{agent}','ConjointController@create')->name('conjoint.create');

});


Route::namespace('Conjointi')->prefix('conjointi')->name('conjointi.')->group(function(){

    Route::resource('conjointi','ConjointisController');
    Route::get('conjointi/create/{agent}','ConjointisController@create')->name('conjointi.create');

});



Route::namespace('Enfant')->prefix('enfant')->name('enfant.')->group(function(){

    Route::resource('enfant','enfantsController');
    Route::get('enfant/create/{conjoint}','enfantsController@create')->name('enfant.create');

});


Route::namespace('Personne')->prefix('personne')->name('personne.')->group(function(){

    Route::resource('personne','PersonnesController');
    Route::get('/searchpersonne','PersonnesController@search')->name('personne.search');
    Route::get('personne/create/{agent}','PersonnesController@create')->name('personne.create');

});


Route::namespace('Enfanti')->prefix('enfanti')->name('enfanti.')->group(function(){

    Route::resource('enfanti','EnfantisController');
    Route::get('enfanti/create/{conjointi}','EnfantisController@create')->name('enfanti.create');
    

});


Route::namespace('Deploiement')->prefix('deploiement')->name('deploiement.')->group(function(){

    Route::resource('deploiement','DeploiementsController');
    Route::get('/mutation','DeploiementsController@mutation')->name('deploiement.mutation');

});


Route::namespace('Fonction')->prefix('fonction')->name('fonction.')->group(function(){

    Route::resource('fonction','FonctionsController');

});


Route::namespace('Structure')->prefix('structure')->name('structure.')->group(function(){

    Route::resource('structure','StructuresController');

});


Route::namespace('TypeAgent')->prefix('typeagent')->name('typeagent.')->group(function(){

    Route::resource('typeagent','TypeagentsController');
});


Route::namespace('EtatsGeneral')->prefix('EtatGeneral')->name('EtatGeneral.')->group(function(){

    Route::get('EtatGeneral/conjoint','EtatsController@etatsGeneralConjointLegitime')->name('AgentsConjoint');

});


Route::namespace('EtatsGeneral')->prefix('EtatGeneral')->name('EtatGeneral.')->group(function(){

    Route::get('EtatGeneral/conjointi','EtatsController@etatsGeneraletatsGeneralConjointIlLegitime')->name('AgentsConjointi');

});

Route::get('Charts','ChartsController@index')->name('agent.Charts');


Route::get('/invoice', function() {

    $pdf = PDF::loadView('invoice');
    return $pdf->download('invoice.pdf');

});