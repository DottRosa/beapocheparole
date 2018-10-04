<?php

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


/* START Dev routing */

Route::get('/bignami', function () {
    return view('bignami');
});

/* END Dev routing */


/* ADMIN */
Route::group(['prefix' => 'admin'], function(){

    //Login
    Route::post('/login', 'AdminLogin@login');
    //Logout
    Route::get('/logout', 'AdminLogin@logout');

    //Dashboard
    Route::get('/', 'AdminDashboard');
    //Immagini
    Route::get('/images', 'AdminImages');
    //Utenti
    Route::get('/users', 'AdminUsers');

    Route::get('/users/add', 'AdminUser');
    Route::post('/users/add', 'AdminUser@create');
    Route::get('/users/edit/{id}', 'AdminUser@get');
    Route::post('/users/edit/{id}', 'AdminUser@update');
    Route::get('/users/delete/{id}', 'AdminUser@delete');

});
