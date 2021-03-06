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

Route::prefix('cookies')->group(function () {
    Route::post('/', ['as' => 'cookies.set', 'uses' => 'CookieController@set']);
    Route::get('/show/{name}', ['as' => 'cookies.get', 'uses' => 'CookieController@get']);
    Route::get('/forget', ['as' => 'cookies.forget', 'uses' => 'CookieController@forget']);
});

Route::get('/login', ['as' => 'login', 'uses' => function() {
    return view('login');
}]);


Route::middleware('auth')->group(function () {
    Route::get('/', ['as' => 'home', 'uses' => function() {
        return view('home');
    }]);

    Route::get('/cadastrar-agente', ['as' => 'create.agent', 'uses' => function() {
        return view('create-agent');
    }]);

    Route::get('/cadastrar-condominio', ['as' => 'create.condominium', 'uses' => function() {
        return view('create-condominium');
    }]);

    Route::get('/cadastrar-morador', ['as' => 'create.dweller', 'uses' => function() {
        return view('create-dweller');
    }]);

    Route::get('/tickets', ['as' => 'tickets', 'uses' => function() {
        return view('tickets');
    }]);

    Route::get('/tickets/{ticket}', ['as' => 'ticket', 'uses' => 'RouteController@ticketShow']);

    Route::get('/liberacoes', ['as' => 'releases.index', 'uses' => function() {
        return view('releases');
    }]);

    Route::get('/em-breve', ['as' => 'soon', 'uses' => function() {
        return view('soon');
    }]);
});
