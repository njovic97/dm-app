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

//Home routes
Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);


//Employees routes
Route::get('/employees', [
    'as' => 'employees',
    'uses' => 'EmployeesController@index',
]);
