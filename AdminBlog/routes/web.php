<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@dashboard');
Route::get('/visitors','visitorController@home');
Route::get('/services','AdminController@services');
Route::get('/dataService','AdminController@dataService');
Route::get('/addCourse','AdminController@addCourse');
Route::get('/save','AdminController@save');
Route::post('/delete','AdminController@delete');
Route::post('/edit','AdminController@editService');
Route::post('/update','AdminController@updateService');
Route::post('/add','AdminController@addNew');

