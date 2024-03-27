<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.home');
    } else {
        return redirect()->route('user.folders');
    }
})->name('dashboard');



Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [ProfileController::class, 'adminHome'])->name('home'); // Admin homepage

    // Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
  
    Route::get('/users', [ProfileController::class, 'index'])->name('dashboard');
    Route::get('/create-user', [RegisteredUserController::class, 'create'])->name('users.create');
    Route::post('/users', [RegisteredUserController::class, 'store'])->name('store-user');
    Route::get('/users/{user}/edit', [ProfileController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [ProfileController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [ProfileController::class, 'destroy'])->name('users.destroy');


    // Route::resource('folders', FolderController::class)->names('folders');
    Route::resource('folders', FolderController::class)->names('folders')->except(['show']);

    
    Route::resource('files', FileController::class)->names('files');

    Route::get('/folders/assign', [FolderController::class, 'assign'])->name('admin.assign-folders');
    Route::post('/folders/assign-folders', [FolderController::class, 'store_assign'])->name('folders.assign.store');

    Route::get('/users-folders', [UserController::class, 'usersFolders'])->name('admin.users-folders');

 });

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/folders', [UserController::class, 'folders'])->name('folders');
    Route::get('/folders/{folder}', [FolderController::class, 'files'])->name('user.folders');

    Route::get('/folders/{folder}/files', [FolderController::class, 'files'])->name('files');
    Route::get('/files/{file}/preview', [FileController::class, 'preview'])->name('file.preview');


});


// Authentication routes
require __DIR__ . '/auth.php';
