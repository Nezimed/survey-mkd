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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Bo')->prefix('bo')->middleware(['auth', 'admin'])->group(function () {
    Route::get('projects', 'ProjectController@index')
         ->name('projects.index');

    Route::get('projects/create', 'ProjectController@create')
         ->name('projects.create');

    Route::post('projects', 'ProjectController@store')
         ->name('projects.store');

    Route::get('clients', 'ClientController@index')
         ->name('clients.index');

    Route::get('clients/create', 'ClientController@create')
         ->name('clients.create');

    Route::post('clients', 'ClientController@store')
         ->name('clients.store');

    Route::get('reports', 'ReportsController@index')
         ->name('reports.index');
});

Route::get('/survey/{uuid}', 'SurveyController@create')
     ->name('survey.create');

Route::post('/survey/{uuid}', 'SurveyController@store')
     ->name('survey.store');

