<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/seamen/profile/schools/{id}', [
    'uses' => 'Seamen\ProfileController@userschools',
    'as' => 'seamen.userschools'
]);
Route::get('/seamen/answers/{id}', [
    'uses' => 'Seamen\FeedbackController@answers',
    'as' => 'seamen.feedback.answers'
]);
Route::get('/seamen/quizzes/{id}', [
    'uses' => 'Seamen\InterviewController@quizzes',
    'as' => 'seamen.interview.quizzes'
]);

Route::middleware('auth')->get('/seamen/questions/{id}', [
    'uses' => 'Seamen\InterviewController@questions',
    'as' => 'seamen.interview.questions'
]);

Route::post('/seamen/interview/quizresult', [
    'uses' => 'Seamen\InterviewController@quizresult',
    'as' => 'seamen.interview.quizresult'
]);
Route::post('/seamen/interview/invited', [
    'uses' => 'Seamen\InterviewController@invited',
    'as' => 'seamen.interview.invited'
]);

Route::delete('/seamen/profile/schooldelete/{id}', [
    'uses' => 'Seamen\ProfileController@schooldelete',
    'as' => 'seamen.userschools'
]);
Route::post('/seamen/profile/addschool', [
    'uses' => 'Seamen\ProfileController@addschool',
    'as' => 'seamen.profile.addschools'
]);
Route::post('/seamen/profile/addservice', [
    'uses' => 'Seamen\ProfileController@addservice',
    'as' => 'seamen.profile.addservice'
]);

Route::post('/seamen/profile/updateservice', [
    'uses' => 'Seamen\ProfileController@updateservice',
    'as' => 'seamen.profile.updateservice'
]);
Route::post('/seamen/profile/updateschool', [
    'uses' => 'Seamen\ProfileController@updateschool',
    'as' => 'seamen.profile.updateschool'
]);



Route::get('/seamen/profile/documents/{id}', [
    'uses' => 'Seamen\ProfileController@documents',
    'as' => 'seamen.editdocument'
]);
Route::get('/seamen/profile/services/{id}', [
    'uses' => 'Seamen\ProfileController@services',
    'as' => 'seamen.getservices'
]);


Route::post('/seamen/profile/documentadd', [
    'uses' => 'Seamen\ProfileController@documentadd',
    'as' => 'seamen.profile.documentadd'
]);

Route::post('/seamen/profile/updatedocument', [
    'uses' => 'Seamen\ProfileController@updatedocument',
    'as' => 'seamen.profile.updatedocument'
]);
Route::post('/seamen/profile/updatepersonal', [
    'uses' => 'Seamen\ProfileController@updatepersonal',
    'as' => 'seamen.profile.updatepersonal'
]);
Route::post('/seamen/profile/updatemaininfo', [
    'uses' => 'Seamen\ProfileController@updatemaininfo',
    'as' => 'seamen.profile.updatemaininfo'
]);
Route::post('/seamen/profile/updateaddress', [
    'uses' => 'Seamen\ProfileController@updateaddress',
    'as' => 'seamen.profile.updateaddress'
]);



Route::get('/countries', [
    'uses' => 'Seamen\ProfileController@countries',
    'as' => 'seamen.editdocument'
]);
Route::get('/doctypes', [
    'uses' => 'Seamen\ProfileController@doctypes',
    'as' => 'seamen.editdocument'
]);
Route::get('/userinfo/{id}', [
    'uses' => 'Seamen\ProfileController@userinfo',
    'as' => 'seamen.userinfo'
]);

//Emplyer routes
Route::post('/employer/invite/sendinvites', [
    'uses' => 'Employer\InviteController@sendinvites',
    'as' => 'employer.invites.sendinvites'
]);
Route::get('/employer/vacancies/{user_id}', [
    'uses' => 'Employer\VacancyController@vacancies',
    'as' => 'employer.vacancies'
]);
Route::get('/employer/candidates', [
    'uses' => 'Employer\VacancyController@candidates',
    'as' => 'employer.candidates'
]);
