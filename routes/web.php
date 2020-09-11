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
    Route::get('/decedes','AgentsController@decedes')->name('agents.decedes');

});


Route::namespace('Etat')->prefix('etat')->name('etat.')->group(function(){

    Route::resource('etats','EtatsController');

});



Route::namespace('PersonneAPrevenir')->prefix('personneaprevenir')->name('personneaprevenir.')->group(function(){

    Route::resource('personneaprevenir','PersonneAPrevenirController');

});


Route::namespace('Conjoint')->prefix('conjoint')->name('conjoint.')->group(function(){

    Route::resource('conjoint','ConjointController');
    Route::get('/decedes','ConjointController@decedes')->name('conjoints.decedes');

});


Route::namespace('Conjointi')->prefix('conjointi')->name('conjointi.')->group(function(){

    Route::resource('conjointi','ConjointisController');

});



Route::namespace('Enfant')->prefix('enfant')->name('enfant.')->group(function(){

    Route::resource('enfant','enfantsController');

});


