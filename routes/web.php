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

        Route::group(['prefix' => 'categories'], function(){
            //Immagini
            Route::get('/', 'AdminImagesCategories');
            Route::get('/add', 'AdminImagesCategory');
            Route::post('/add', 'AdminImagesCategory@create');
            Route::get('/edit/{id}', 'AdminImagesCategory@get');
            Route::post('/edit/{id}', 'AdminImagesCategory@update');
            Route::get('/delete/{id}', 'AdminImagesCategory@delete');
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

        Route::group(['prefix' => 'categories'], function(){
            //Immagini
            Route::get('/', 'AdminDocumentsCategories');
            Route::get('/add', 'AdminDocumentsCategory');
            Route::post('/add', 'AdminDocumentsCategory@create');
            Route::get('/edit/{id}', 'AdminDocumentsCategory@get');
            Route::post('/edit/{id}', 'AdminDocumentsCategory@update');
            Route::get('/delete/{id}', 'AdminDocumentsCategory@delete');
        });
    });
});
