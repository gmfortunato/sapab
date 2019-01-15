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

Route::get('/', 'FrontController@front')-> middleware('updateVisits');
Route::any('/pesquisar', 'FrontController@pesquisar');

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
        Route::get('users/{id}/delete', 'UsersController@delete');


        Route::resource('places', 'PlacesController');
        Route::get('places/{id}/delete', 'PlacesController@delete');

        Route::resource('faqs', 'FaqsController');
        Route::get('faqs/{id}/delete', 'FaqsController@delete');

        Route::get('lotteries/winners', 'LotteriesController@winners');
        Route::get('lotteries/results', 'LotteriesController@results');
        Route::resource('lotteries', 'LotteriesController');
        Route::get('lotteries/{id}/delete', 'LotteriesController@delete');

    });

});

