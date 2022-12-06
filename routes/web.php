<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BladeController;

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
Route::get('/elite/login', [BladeController::class, 'loginform']);
Route::post('/api-request', [BladeController::class, 'formRequest']);
Route::get('/elite/crew', [BladeController::class, 'crew']);
