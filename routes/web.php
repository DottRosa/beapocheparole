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

    Route::get('/', 'AdminDashboard');
    Route::post('/login', 'AdminLogin@login');
    Route::get('/logout', 'AdminLogin@logout');
});
