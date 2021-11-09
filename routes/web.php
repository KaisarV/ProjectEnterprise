<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FindPeopleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ProfileController;
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
Route::get('/todo', [TodoController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Todo List
Route::get('/todo/create', [TodoController::class, 'create']);
Route::post('/todo/store', [TodoController::class, 'insertTodo']);
Route::get('/todo/{id}/delete', [TodoController::class, 'deleteTodo']);

//Find Person
Route::get('/find', [FindPeopleController::class, 'index']);
Route::post('/find/search', [FindPeopleController::class, 'getPeople']);

//Chat
Route::get('/chat', [ChatController::class, 'index']);
Route::get('/chat/room/{id}', [ChatController::class, 'getChat']);
Route::post('/chat/send', [ChatController::class, 'sendChat']);

//Discussion
Route::get('/discussion', [DiscussionController::class, 'index']);

//Profile
Route::get('/profile/{id}', [ProfileController::class, 'index']);
