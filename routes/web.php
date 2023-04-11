<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\VisitController::class,'index'])->name('welcome');
Route::get('/daily-report',[\App\Http\Controllers\VisitController::class,'dailyReport'])->name('daily');
Route::get('/monthly-report',[\App\Http\Controllers\VisitController::class,'monthlyReport'])->name('monthly');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
