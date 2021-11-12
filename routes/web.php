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
use App\Http\Controllers\DeleteEmployeeController;
use App\Http\Controllers\RegisterController;
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

//Auth
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Todo List
Route::get('/todo', [TodoController::class, 'index']);
Route::get('/todo/create', [TodoController::class, 'create']);
Route::post('/todo/store', [TodoController::class, 'insertTodo']);
Route::get('/todo/{id}/delete', [TodoController::class, 'deleteTodo']);

//Find Employee
Route::get('/find', [FindPeopleController::class, 'index']);
Route::post('/find/search', [FindPeopleController::class, 'getPeople']);

//Chat
Route::get('/chat', [ChatController::class, 'index']);
Route::get('/chat/room/{id}', [ChatController::class, 'getChat']);
Route::post('/chat/send', [ChatController::class, 'sendChat']);

//Discussion
Route::get('/discussion', [DiscussionController::class, 'index']);
Route::get('/discussion/chat/{id}', [DiscussionController::class, 'getChat']);
Route::post('/discussion/send', [DiscussionController::class, 'sendChat']);

//Profile
Route::get('/profile/{id}', [ProfileController::class, 'index']);

//Delete Employee
Route::get('/deleteemployee', [DeleteEmployeeController::class, 'index']);
Route::post('/deleteemployee/search', [DeleteEmployeeController::class, 'getPeople']);
Route::get('/deleteemployee/delete/{id}', [DeleteEmployeeController::class, 'deletePeople']);

//Register
Route::get('/register', [RegisterController::class, 'index']);

//Announcement
Route::get('/announce', [AnnouncementController::class, 'index']);
