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






Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('homepage');

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::get('/dashboard', [
         'uses' => 'PostController@getDashboard',
         'as' => 'dashboard',
         'middleware' => 'auth'
     ]);

    Route::post('/signin', [
        'uses' =>'UserController@postSingIn',
        'as' => 'signin' 
    ]);

    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create',
        'middleware' => 'auth'
    ]);
    Route::get('/post-delete/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete',
        'middleware' => 'auth'
    ]);
    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ] ) ;

    Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
        'as' => 'edit',
        'middleware' => 'auth'
    ]);
    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account',
        'middleware' => 'auth'
    ]);

    // Route::post('/updateaccount', [
    //     'uses' => 'UserController@postSaveAccount',
    //     'as' => 'account.save',
    //     'middleware' => 'auth'
    // ]);
});
