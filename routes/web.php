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
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FeedbackController;

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
Route::get('/todo/edit/{id}', [TodoController::class, 'editTodoPage']);
Route::post('/todo/edit/run', [TodoController::class, 'editTodo']);

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
Route::get('/discussion/create/', [DiscussionController::class, 'createPage']);
Route::post('/discussion/send', [DiscussionController::class, 'sendChat']);
Route::post('/discussion/create/run', [DiscussionController::class, 'create']);
Route::get('/discussion/delete/{id}', [DiscussionController::class, 'delete']);
Route::get('/discussion/delete-member/{id}', [DiscussionController::class, 'deleteMemberPage']);
Route::get('/discussion/delete-member/{id1}/{id2}', [DiscussionController::class, 'deleteMember']);
Route::get('/discusssion/add-member/{id}', [DiscussionController::class, 'addMemberPage']);
Route::get('/discussion/add-member/{id1}/{id2}', [DiscussionController::class, 'addMember']);

//Profile
Route::post('/p/editprofile', [ProfileController::class, 'editProfile']);
Route::get('/profile/{id}', [ProfileController::class, 'index']);
Route::get('/profile/edit/{id}', [ProfileController::class, 'editProfilePage']);
Route::get('/profile/editphoto/{id}', [ProfileController::class, 'editPhotoPage']);
Route::post('/profile/editphoto/run', [ProfileController::class, 'editPhoto']);

//Delete Employee
Route::get('/deleteemployee', [DeleteEmployeeController::class, 'index']);
Route::post('/deleteemployee/search', [DeleteEmployeeController::class, 'getPeople']);
Route::get('/deleteemployee/delete/{id}', [DeleteEmployeeController::class, 'deletePeople']);

//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/insert', [RegisterController::class, 'insertData']);

//Announcement
Route::get('/announce', [AnnouncementController::class, 'index']);

//About Us
Route::view('/about', 'about',  ['title' => 'About Us']);

//Upload (testing upload file)
Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);

//Feedback
Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback/send', [FeedbackController::class, 'sendFeedback']);
