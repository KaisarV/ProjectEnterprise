<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login2', [LoginController::class, 'authenticate']);
Route::post('/login2', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/todo', [TodoController::class, 'index']);
Route::get('/todo/create', [TodoController::class, 'create']);
Auth::routes();
Route::post('/todo/store', [TodoController::class, 'insertTodo']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
