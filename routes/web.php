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


Auth::routes();

Auth::routes(['verify' => true, 'register' => false]);

Route::prefix('')->middleware('auth')->group(function(){

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    //Route::get('/home', 'HomeController@index')->middleware('verified');

    Route::resource('batiments', 'BatimentController');

    Route::resource('chambres', 'ChambreController');
    Route::get('chambres/{id}/depenses', 'ChambreController@show_depenses')->name('chambre.show_depenses');
    Route::get('chambres/{id}/recettes', 'ChambreController@show_recettes')->name('chambre.show_recettes');

    Route::resource('locataires', 'LocataireController')->except('create');
    Route::get('locataires/create/{id}', 'LocataireController@create')->name('locataires.create');
    Route::get('locataires/close/{id}', 'LocataireController@closeBail')->name('locataires.closeBail');
    Route::post('locataires/close/{id}', 'LocataireController@close')->name('locataires.close');

    Route::resource('loyers', 'LoyerController')->except('create', 'store');
    Route::get('loyers/create/{id}', 'LoyerController@create')->name('loyers.create');
    Route::post('loyers/{id}', 'LoyerController@store')->name('loyers.store');
    Route::get('loyer/recu/{id}', 'LoyerController@recus')->name('loyers.recu');

    Route::resource('reparations', 'ReparationController')->except('create', 'store');
    Route::get('reparations/create/{model}/{id}', 'ReparationController@create')->name('reparations.create');
    Route::post('reparations/{model}/{id}', 'ReparationController@store')->name('reparations.store');

    Route::resource('permissions', 'PermissionController');

    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');


});


