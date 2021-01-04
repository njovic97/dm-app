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

Route::get('/home/get-statistics', [
    'as' => 'home-statistics',
    'uses' => 'HomeController@getStatistics',
]);

//Employees routes
Route::get('/employees', [
    'as' => 'employees',
    'uses' => 'EmployeesController@index',
]);

Route::get('/employees/remove', [
    'as' => 'employees-remove',
    'uses' => 'EmployeesController@deleteEmployee',
]);

Route::get('/employees/info', [
    'as' => 'employees-info',
    'uses' => 'EmployeesController@getEmployeeInfoForEdit',
]);

Route::post('/employees/edit', [
    'as' => 'employees-edit',
    'uses' => 'EmployeesController@editEmployee',
]);

Route::post('/employees/create', [
    'as' => 'employees-create',
    'uses' => 'EmployeesController@createEmployee',
]);

//Prices routes
Route::get('/prices', [
    'as' => 'prices',
    'uses' => 'PricesController@index',
]);

Route::get('/prices/remove', [
    'as' => 'prices-remove',
    'uses' => 'PricesController@deletePrice',
]);

Route::post('/prices/create', [
    'as' => 'prices-create',
    'uses' => 'PricesController@createPrice',
]);

Route::get('/prices/get-employee-options', [
    'as' => 'prices-employees',
    'uses' => 'PricesController@getEmployeeOptions',
]);

Route::get('/prices/info', [
    'as' => 'prices-info',
    'uses' => 'PricesController@getPriceInfoForEdit',
]);

Route::post('/prices/edit', [
    'as' => 'prices-edit',
    'uses' => 'PricesController@editPrice',
]);

//Jobs routes
Route::get('/jobs', [
    'as' => 'jobs',
    'uses' => 'JobsController@index',
]);

Route::get('/jobs/remove', [
    'as' => 'jobs-remove',
    'uses' => 'JobsController@deleteJob',
]);

Route::get('/jobs/get-employee-options', [
    'as' => 'jobs-options',
    'uses' => 'JobsController@getEmployeeOptions',
]);

Route::get('/jobs/get-prices-options', [
    'as' => 'jobs-options',
    'uses' => 'JobsController@getPricesOptions',
]);

Route::post('/jobs/create', [
    'as' => 'jobs-create',
    'uses' => 'JobsController@createJob',
]);

Route::get('/jobs/get-job-info', [
    'as' => 'jobs-info',
    'uses' => 'JobsController@getJobInfo',
]);

Route::post('/jobs/edit', [
    'as' => 'jobs-edit',
    'uses' => 'JobsController@editJob',
]);
