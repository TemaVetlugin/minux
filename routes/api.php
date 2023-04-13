<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group([
    'namespace'=>'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::group(['middleware'=>'jwt.auth'], function(){


        Route::group(['namespace'=>'Card', 'prefix'=>'cards'], function(){

            Route::post('/', 'StoreController')->name('cards.store');
            Route::patch('/{card}', 'UpdateController')->name('cards.update');
            Route::delete('/{card}', 'DeleteController')->name('cards.delete');
        });

        Route::group(['namespace'=>'Algorithm', 'prefix'=>'algorithms'], function(){

            Route::post('/', 'StoreController')->name('algorithms.store');
            Route::patch('/{algorithm}', 'UpdateController')->name('algorithms.update');
            Route::delete('/{algorithm}', 'DeleteController')->name('algorithms.delete');
        });

        Route::group(['namespace'=>'Version', 'prefix'=>'versions'], function(){

            Route::post('/', 'StoreController')->name('versions.store');
            Route::patch('/{version}', 'UpdateController')->name('versions.update');
            Route::delete('/{version}', 'DeleteController')->name('versions.delete');
        });
        Route::group(['namespace'=>'Worker', 'prefix'=>'workers'], function(){

            Route::post('/', 'StoreController')->name('workers.store');
            Route::patch('/{worker}', 'UpdateController')->name('workers.update');
            Route::delete('/{worker}', 'DeleteController')->name('workers.delete');
        });
        Route::group(['namespace'=>'Screenshot', 'prefix'=>'screenshots'], function(){

            Route::post('/', 'StoreController')->name('screenshots.store');
            Route::patch('/{screenshot}', 'UpdateController')->name('screenshots.update');
            Route::delete('/{screenshot}', 'DeleteController')->name('screenshots.delete');
        });
        Route::group(['namespace'=>'Roadmap', 'prefix'=>'roadmaps'], function(){

            Route::post('/', 'StoreController')->name('roadmaps.store');
            Route::patch('/{roadmap}', 'UpdateController')->name('roadmaps.update');
            Route::delete('/{roadmap}', 'DeleteController')->name('roadmaps.delete');
        });
        Route::group(['namespace'=>'Feedback', 'prefix'=>'feedbacks'], function(){

            Route::get('/', 'IndexController')->name('feedbacks.index');
            Route::delete('/{feedback}', 'DeleteController')->name('feedbacks.delete');
        });
    });
    Route::group(['namespace'=>'Card', 'prefix'=>'cards'], function(){
        Route::get('/', 'IndexController')->name('cards.index');
    });

    Route::group(['namespace'=>'Feedback', 'prefix'=>'feedbacks'], function(){
        Route::post('/', 'StoreController')->name('feedbacks.store');
    });

    Route::group(['namespace'=>'Algorithm', 'prefix'=>'algorithms'], function(){
        Route::get('/', 'IndexController')->name('algorithms.index');
    });

    Route::group(['namespace'=>'Version', 'prefix'=>'versions'], function(){
        Route::get('/', 'IndexController')->name('versions.index');
    });
    Route::group(['namespace'=>'Worker', 'prefix'=>'workers'], function(){
        Route::get('/', 'IndexController')->name('workers.index');
    });
    Route::group(['namespace'=>'Screenshot', 'prefix'=>'screenshots'], function(){
        Route::get('/', 'IndexController')->name('screenshots.index');
    });
    Route::group(['namespace'=>'Roadmap', 'prefix'=>'roadmaps'], function(){
        Route::get('/', 'IndexController')->name('roadmaps.index');
    });

});

//Route::group(['namespace'=>'App\Http\Controllers\User', 'prefix'=>'users'], function(){
//
//    Route::post('/', 'StoreController');
//});
