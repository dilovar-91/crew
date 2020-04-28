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
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


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
    //'middleware'=>['auth','home.verify.seamen']
], function(){
    
    //Главная страница админа
    Route::get('/', [
        'uses' => 'SeamenController@index',
        'as' => 'seamen.index'
    ]);

 
    Route::get('/interview/{id}', [
        'uses' => 'Seamen\InterviewController@detail',
        'as' => 'seamen.interview.detail'
    ]);
    Route::get('/interview/question/{id}', [
        'uses' => 'Seamen\InterviewController@question',
        'as' => 'seamen.interview.question'
    ]);
    Route::post('/interview/videosend', [
        'uses' => 'Seamen\InterviewController@videosend',
        'as' => 'seamen.interview.videosend'
    ]);
    Route::get('/invites', [
        'uses' => 'SeamenController@invites',
        'as' => 'seamen.invites'
    ]);
    Route::get('/invite/aprove/{id}', [
        'uses' => 'SeamenController@aproveinvite',
        'as' => 'seamen.aproveinvite'
    ]);
    Route::get('/invite/decline/{id}', [
        'uses' => 'SeamenController@declineinvite',
        'as' => 'seamen.declineinvite'
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
Route::group([
    'prefix'=>'employer/',
    'middleware'=>'auth'
], function() {
    Route::get('invite', [
        'uses' => 'Employer\InviteController@index',
        'as'   => 'employerInvite'
    ]);


});

