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

//Immagini
Route::get('/immagini', 'Images');
Route::get('/testi', 'Documents');
Route::get('/testi/{id}', 'Document');
Route::get('/gallerie', 'Galleries');
Route::get('/gallery/{id}', 'Gallery');
Route::get('/cookies', function(){
    return view('cookies');
});
Route::get('/privacy', function(){
    return view('privacy');
});

Route::post('/email', 'EmailSender@send');

/* START Dev routing */

Route::get('/bignami', function () {
    return view('bignami');
});

Route::get('/findme', function () {
    return view('youfoundme');
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

Route::get('admin/media/search{q?}{offset?}{limit?}{type?}{tags?}', 'AdminMedia@search');

Route::post('errors/report{error?}{url?}{line?}', 'ErrorsTracker@report');


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

    //Logs and errors
    Route::get('/logs', 'AdminLogs');
    Route::get('/errors', 'AdminErrors');

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

    Route::group(['prefix' => 'galleries'], function(){
        Route::group(['prefix' => 'list'], function(){
            //Immagini
            Route::get('/', 'AdminGalleries');
            Route::get('/add', 'AdminGallery');
            Route::post('/add', 'AdminGallery@create');
            Route::get('/edit/{id}', 'AdminGallery@get');
            Route::post('/edit/{id}', 'AdminGallery@update');
            Route::get('/delete/{id}', 'AdminGallery@delete');
        });
    });
});
