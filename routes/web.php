<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\LanguageController;
use App\Http\Models\Conference;
//use App\Http\Controllers\MainConferenceController;



// USER
Route::get('/user/conference', [UserController::class, 'index'])->name('user.conferences');
Route::get('/user/conference/{id}', [UserController::class, 'show'])->name('user.conference.show');
Route::post('/user/conference/{id}/register', [UserController::class, 'register'])->name('user.conference.register');
Route::get('/user/conference', [UserController::class, 'index'])->name('conference');
Route::get('/conference/{id}', [UserController::class, 'show'])->name('conference.show');

// WORKER
Route::get('/worker/conferences', [WorkerController::class, 'index'])->name('worker.conferences');
Route::get('/worker/conference/{id}', [WorkerController::class, 'show'])->name('worker.conference.show');
Route::get('/worker/conference/{id}/users', [WorkerController::class, 'showRegisteredUsers'])->name('worker.conference.registered_users');

// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/conferences', [ConferenceController::class, 'index'])->name('admin.conferences.index');
    Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('admin.conferences.create');
    Route::post('/conferences', [ConferenceController::class, 'store'])->name('admin.conferences.store');
    Route::get('/conferences/{id}/edit', [ConferenceController::class, 'edit'])->name('admin.conferences.edit');
    Route::put('/conferences/{id}', [ConferenceController::class, 'update'])->name('admin.conferences.update');
    Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');

    Route::get('conferences/{id}/registered-users', [ConferenceController::class, 'showRegisteredUsers'])
    ->name('conferences.registered_users');

    // USER ADMIN
    Route::get('users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('users/{id}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{id}', [UsersController::class, 'update'])->name('admin.users.update');
});


// LANG
Route::get('lang/{lang}', [LanguageController::class, 'switchLanguage'])->name('lang.switch');

// LOGIN PAGE
Route::get('/', function () {
    return view('index');
})->name('index');

// MAIN PAGE

Route::get('/main', function () {
    return view('main.main');
})->name('main');

// ADMIN PAGE

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

// LOGOUT

Route::post('/logout', function () {
    return redirect()->route('index');
})->name('logout');


