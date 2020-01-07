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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@main')->name('main_page');     
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('question', 'QuestionController');
Route::resource('category', 'CategoryController');

Route::post('offer', 'OfferController@store')->name('offer.store');
Route::put('offer/{offer}', 'OfferController@update')->name('offer.update');

Route::resource('answer', 'AnswerController');
Route::delete('user/{user}' , 'DeleteController@delete')->name('user.delete');

Route::get('readNotificaton/{not_id}/{question_id}' , function($not_id , $question_id) {
    
   auth()->user()->unreadNotifications->where('id' , $not_id)->markAsRead();

   return redirect(route('question.show' , ['question'=>$question_id]));

})->name('read_not');


Route::Post('lawyer' , 'LawyerController@store')->name('lawyer.store');
Route::Put('lawyer/{lawyer}' , 'LawyerController@update')->name('lawyer.update');