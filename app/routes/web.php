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

Route::get('/', 'LoginController@showLogin');
Route::get('/create-user', 'LoginController@showCreateUser');
Route::post('/create-user', 'LoginController@createUser');
Route::post('/login', 'LoginController@login');
Route::get('/dashboard', 'DashboardController@showDashboard');
Route::get('/add-income', 'DashboardController@showAddIncome');
Route::post('/add-income', 'DashboardController@addIncome');
