<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

/*Route::get('/', function(){
    return view('index');
});*/

Route::get('/', 'FrontController@front');

Route::get('/login', function(){
    if(!Auth::user()) {
        return redirect()->to('/admin/login');
    }else{
        return redirect()->to('/admin/dashboard');
    }
});

Route::get('/admin', function(){
    if(!Auth::user()) {
        return redirect()->to('/admin/login');
    }else{
        return redirect()->to('/admin/dashboard');
    }
});

Route::prefix('admin')->group(function(){
    Auth::routes();

    Route::get('/login', function(){
        if(Auth::user()) {
            return redirect()->to('/admin/dashboard');
        }else{
            return view('auth.login');
        }
    });

    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/dashboard', 'HomeController@index');

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => 'auth'
    ], function () {

        Route::resource('users', 'UsersController');

    });

    //EXTRA ROUTES
    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => 'auth'
    ], function () {

        Route::resource('places', 'PlacesController');

    });

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => 'auth'
    ], function () {

        Route::resource('faqs', 'FaqsController');

    });

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => 'auth'
    ], function () {

        Route::resource('lotteries', 'LotteriesController');

    });
});

