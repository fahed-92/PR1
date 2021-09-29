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

//Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/electionprog/get','BrowseProgElectionController@get')->name('elctionprog.get');
Route::get('/electionprog/show/{id}','BrowseProgElectionController@show')->name('elctionprog.show');


Route::get('/candidates/get/{id}','GetCandidateController@get')->name('candidates.get');
Route::get('/candidates/show/{id}','GetCandidateController@show')->name('candidates.show');
Route::get('/candidates/create/{prog_id}','GetCandidateController@create')->name('candidates.create');
Route::post('/candidates/store','GetCandidateController@store')->name('candidates.store');


