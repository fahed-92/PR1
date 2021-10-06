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
Route::middleware('web')->group(function() {
    Route::GET('/admin', 'DashboardController@index')->name('admin.dashboard');
});
Route::group(['prefix'=>'admin/electionprog'],function(){
    route::GET('/','ElectionProgramsController@index')->name('admin.electionprog');
    route::GET('/create','ElectionProgramsController@create')->name('admin.electionprog.create');
    route::POST('/store','ElectionProgramsController@store')->name('admin.electionprog.store');
    route::GET('/edit/{id}','ElectionProgramsController@edit')->name('admin.electionprog.edit');
    route::PUT('/update/{id}','ElectionProgramsController@update')->name('admin.electionprog.update');
    route::DELETE('/delete/{id}','ElectionProgramsController@destroy')->name('admin.electionprog.delete');
    route::PUT('/status/{id}','ElectionProgramsController@changeStatus')->name('admin.electionprog.status');
//    route::delete('/store','ElectionProgramsController@store')->name('admin.electionprog.delete');
//    route::delete('/store','ElectionProgramsController@store')->name('admin.maincategories.status');
});

Route::group(['prefix'=>'admin/candidate'],function(){
    route::get('/','CandidatesController@index')->name('admin.candidate');
    route::get('/req','CandidatesController@req_index')->name('admin.candidate.req_index');
    route::get('/{id}','CandidatesController@show_request')->name('admin.candidate.show');
    route::get('/create','CandidatesController@create')->name('admin.candidate.create');
    route::post('/store','CandidatesController@store')->name('admin.candidate.store');
    route::get('/edit/{id}','CandidatesController@edit')->name('admin.candidate.edit');
    route::PUT('/update/{id}','CandidatesController@update')->name('admin.candidate.update');
    route::DELETE('/delete/{id}','CandidatesController@destroy')->name('admin.candidate.delete');
    route::PUT('/status/{id}','CandidatesController@changeStatus')->name('admin.candidate.status');
    route::get('/requests','CandidatesController@requests')->name('admin.candidate.requests');
    route::get('/show_requests/{id}','CandidatesController@show_request')->name('admin.candidate.show_request');
    route::PUT('/approved/{id}','CandidatesController@approved')->name('admin.candidate.approved');
});
//@define('PAGINATION_COUNT',10);
