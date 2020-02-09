<?php

Route::get('/', function() {
    return view('welcome');
});

// Auth::routes();

Route::get('/company', 'CompanyController@view')->name('company.index');
Route::get('/companies', 'CompanyController@get_company_data')->name('data');
Route::get('/addcompany', 'CompanyController@view')->name('company.view');
Route::post('/addcompany', 'CompanyController@Store')->name('company.store');
Route::delete('/addcompany/{id}', 'CompanyController@destroy')->name('company.destroy');
Route::get('/addcompany/{id}/edit', 'CompanyController@update')->name('company.update');