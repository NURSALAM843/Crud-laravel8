<?php

use App\Http\Controllers\IlkomController;
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

Route::get('/dashboard/crud/checkSlug', [IlkomController::class, 'checkSlug']);
Route::resource('/dashboard/crud', IlkomController::class)->except('show');
