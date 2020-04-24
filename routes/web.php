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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/seamen', 'SeamenController@index')->name('seamen.index');
Route::get('/test', 'SeamenController@test')->name('seamen.test');
Route::get('lang/{locale}', 'HomeController@lang');


Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});

Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
Route::view('/landing', 'landing');


Route::group([
    'prefix'=>'seamen',
    'middleware'=>['auth','home.verify.seamen']
], function(){
    Route::get('/video', 'SeamenController@video')->name('video');
    Route::get('/video/watch', 'SeamenController@videoWatch')->name('videoWatch');
    Route::post('/video/send', 'SeamenController@videoSend')->name('videoPost');
    Route::get('/invite', [
        'uses' => 'Seamen\InviteController@index',
        'as' => 'seamenInvite'
    ]);

    //Главная страница админа
    Route::get('/', [
        'uses' => 'Seamen\ControllerIndex@index',
        'as' => 'seamen.index'
    ]);

    //Главная страница админа
    Route::get('/polls', [
        'uses' => 'Seamen\ControllerPolls@index',
        'as' => 'seamen.polls.index'
    ]);

    //Главная страница админа
    Route::get('/polls/{id}', [
        'uses' => 'Seamen\ControllerPolls@poll',
        'as' => 'seamen.polls.poll'
    ]);


});

