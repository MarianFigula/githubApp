<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\UsersController::class, 'getGithubUsers'])->name("index");
Route::get('/chart/{username}', [App\Http\Controllers\ChartController::class, 'getNumberOfFollowers'])->name("chart");
