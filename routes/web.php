<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SalarieController;
use App\Http\Controllers\ServicesController;

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
Route::get('/', function () { return view('index'); });
/*
|------------------------------------------------------------------------
|   Salaries
|------------------------------------------------------------------------
*/
Route::get('/salaries', [SalarieController::class,'index']);

// show create form
Route::get('/salaries/create',[SalarieController::class,'create']);

// store salarie
Route::post('/salaries',[SalarieController::class,'store']);

// show Edit salarie
Route::get('/salaries/{salarie}/edit',[SalarieController::class,'edit']);

// Edit salarie
Route::put('/salaries/{salarie}',[SalarieController::class,'update']);

// Delete salarie
Route::delete('/salaries/{salarie}',[SalarieController::class,'destroy']);

// show salarie
Route::get('/salaries/show',[SalarieController::class,'show']);

/*
|------------------------------------------------------------------------
|   Services
|------------------------------------------------------------------------
*/
//
Route::resource('services',ServicesController::class);

/*
|------------------------------------------------------------------------
|   Companies
|------------------------------------------------------------------------
*/
//
Route::resource('companies',CompanyController::class);

//
