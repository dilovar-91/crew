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

    //profile routes    
    Route::get('/profile', [
        'uses' => 'Seamen\ProfileController@index',
        'as' => 'seamen.profile.index'
    ]);
    Route::get('/profile/edit/main', [
        'uses' => 'Seamen\ProfileController@editmain',
        'as' => 'seamen.profile.editmain'
    ]);

    Route::get('/profile/edit/personal', [
        'uses' => 'Seamen\ProfileController@editpersonal',
        'as' => 'seamen.profile.editpersonal'
    ]);
    Route::get('/profile/edit/main', [
        'uses' => 'Seamen\ProfileController@editmaininfo',
        'as' => 'seamen.profile.editmaininfo'
    ]);
    Route::get('/profile/edit/adress', [
        'uses' => 'Seamen\ProfileController@editadress',
        'as' => 'seamen.profile.editadress'
    ]);
    Route::get('/profile/edit/school', [
        'uses' => 'Seamen\ProfileController@editschool',
        'as' => 'seamen.profile.editschool'
    ]);

    Route::get('/profile/edit/document', [
        'uses' => 'Seamen\ProfileController@editdoc',
        'as' => 'seamen.profile.editdoc'
    ]);
    Route::get('/profile/edit/service', [
        'uses' => 'Seamen\ProfileController@editservice',
        'as' => 'seamen.profile.editservice'
    ]);
    Route::get('/profile/edit/courses', [
        'uses' => 'Seamen\ProfileController@editcourses',
        'as' => 'seamen.profile.editcourses'
    ]);
    Route::get('/profile/edit/documents', [
        'uses' => 'Seamen\ProfileController@editdocuments',
        'as' => 'seamen.profile.editdocuments'
    ]);
    Route::get('/interview/{id}', [
        'uses' => 'Seamen\InterviewController@detail',
        'as' => 'seamen.interview.detail'
    ]);
    Route::get('/interview/record/{id}', [
        'uses' => 'Seamen\InterviewController@record',
        'as' => 'seamen.interview.record'
    ]);
    Route::get('/interview/question/{id}', [
        'uses' => 'Seamen\InterviewController@question',
        'as' => 'seamen.interview.question'
    ]);
    Route::post('/interview/videosend', [
        'uses' => 'Seamen\InterviewController@videosend',
        'as' => 'seamen.interview.videosend'
    ]);

    Route::get('/interview/quiz/{interview_id}', [
        'uses' => 'Seamen\InterviewController@quiz',
        'as' => 'seamen.interview.quiz'
    ]);
    Route::get('/invites', [
        'uses' => 'SeamenController@invites',
        'as' => 'seamen.invites'
    ]);
    Route::get('/feedback', [
        'uses' => 'Seamen\FeedbackController@index',
        'as' => 'seamen.feedbacks'
    ]);
    Route::get('/feedback/{id}', [
        'uses' => 'Seamen\FeedbackController@detail',
        'as' => 'seamen.feedback.detail'
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
    Route::get('vacancy/create', [
        'uses' => 'Employer\VacancyController@create',
        'as'   => 'employervacancycreate'
    ]);
    Route::get('interview/create', [
        'uses' => 'Employer\InterviewController@create',
        'as'   => 'employerinterviewcreate'
    ]);


});



