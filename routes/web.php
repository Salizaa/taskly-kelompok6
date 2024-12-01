<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;


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
    return view('getstarted');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::prefix('tasks')->middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/complete/{task}', [TaskController::class, 'complete'])->name('tasks.complete');

    // berdasartkan status
    Route::get('/completed', [TaskController::class, 'showCompletedTasks'])->name('tasks.completed');
    Route::get('/ongoing', [TaskController::class, 'showOngoingTasks'])->name('tasks.ongoing');
    Route::get('/missed', [TaskController::class, 'showMissedTasks'])->name('tasks.missed');


    Route::get('/notification', [TaskController::class, 'showNotification'])->name('tasks.notification');

    // berdasarkan kategori
    Route::get('/work', [TaskController::class, 'showWorkTasks'])->name('tasks.work');
    Route::get('/personal', [TaskController::class, 'showPersonalTasks'])->name('tasks.personal');
    Route::get('/education', [TaskController::class, 'showEducationTasks'])->name('tasks.education');
});

Route::prefix('attachments')->middleware('auth')->group(function () {
    Route::get('/', [AttachmentController::class, 'index'])->name('attachments.index');
    Route::get('/create', [AttachmentController::class, 'create'])->name('attachments.create');
    Route::post('/store', [AttachmentController::class, 'store'])->name('attachments.store');
    Route::delete('/destroy/{attachment}', [AttachmentController::class, 'destroy'])->name('attachments.destroy');
});


Route::prefix('comments')->middleware('auth')->group(function () {
    Route::get('/', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/store', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/destroy/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
