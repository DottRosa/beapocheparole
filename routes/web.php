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
    return view('home');
});


/* START Dev routing */

Route::get('/bignami', function () {
    return view('bignami');
});

/* END Dev routing */


Route::get('storage/{filename}', function ($filename){
    return Image::make(storage_path('public/' . $filename))->response();
});


//Login
Route::get('admin/', 'AdminLogin')->name('login');
Route::post('admin/', 'AdminLogin@login');
//Logout
Route::get('admin/logout', 'AdminLogin@logout');


/* ADMIN */
Route::group(['prefix' => 'admin', 'middleware' => ['verify.session']], function(){
    //Dashboard
    Route::get('/dashboard', 'AdminDashboard');

    //Utenti
    Route::get('/users', 'AdminUsers');
    Route::get('/users/add', 'AdminUser');
    Route::post('/users/add', 'AdminUser@create');
    Route::get('/users/edit/{id}', 'AdminUser@get');
    Route::post('/users/edit/{id}', 'AdminUser@update');
    Route::get('/users/delete/{id}', 'AdminUser@delete');

    //Logs
    Route::get('/logs', 'AdminLogs');

    Route::group(['prefix' => 'images'], function(){
        Route::group(['prefix' => 'list'], function(){
            //Immagini
            Route::get('/', 'AdminImages');
            Route::get('/add', 'AdminImage');
            Route::post('/add', 'AdminImage@create');
            Route::get('/edit/{id}', 'AdminImage@get');
            Route::post('/edit/{id}', 'AdminImage@update');
            Route::get('/delete/{id}', 'AdminImage@delete');
        });
    });

    Route::group(['prefix' => 'documents'], function(){
        Route::group(['prefix' => 'list'], function(){
            //Immagini
            Route::get('/', 'AdminDocuments');
            Route::get('/add', 'AdminDocument');
            Route::post('/add', 'AdminDocument@create');
            Route::get('/edit/{id}', 'AdminDocument@get');
            Route::post('/edit/{id}', 'AdminDocument@update');
            Route::get('/delete/{id}', 'AdminDocument@delete');
        });
    });

    Route::group(['prefix' => 'tags'], function(){
        //Immagini
        Route::get('/', 'AdminMediaTags');
        Route::get('/add', 'AdminMediaTag');
        Route::post('/add', 'AdminMediaTag@create');
        Route::get('/edit/{id}', 'AdminMediaTag@get');
        Route::post('/edit/{id}', 'AdminMediaTag@update');
        Route::get('/delete/{id}', 'AdminMediaTag@delete');
    });
});
