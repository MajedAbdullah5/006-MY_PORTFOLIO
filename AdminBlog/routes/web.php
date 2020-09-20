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

Route::get('/', 'AdminController@dashboard');
Route::get('/visitors','visitorController@home');
Route::get('/services','AdminController@services');
Route::get('/dataService','AdminController@dataService');
Route::get('/addCourse','AdminController@addCourse');
Route::get('/save','AdminController@save');
Route::post('/delete','AdminController@delete');

