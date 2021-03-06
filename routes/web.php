<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ChangePasswordController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class);
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('user.change.password');

//country routes
Route::resource('countries', CountryController::class);
//state routes
Route::resource('states', StateController::class);
//city routes
Route::resource('cities', CityController::class);
//department routes
Route::resource('departments', DepartmentController::class);