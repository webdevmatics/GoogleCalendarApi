<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('frontpage');
    });

    Route::resource('notebooks', 'NotebooksController');
    Route::resource('notes', 'NotesController');

    Route::get('notes/{notebookId}/createNote', 'NotesController@createNote')->name('notes.createNote');

});

Auth::routes();

Route::resource('gcalendar', 'gCalendarController');
Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);

// Route::get('/home', 'HomeController@index');
