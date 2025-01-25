<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'loginpage'])->name('loginpage');
Route::get('/registerpage', [ProjectController::class, 'registerpage'])->name('registerpage');

Route::post('/login', [ProjectController::class, 'login'])->name('login');
Route::post('/register', [ProjectController::class, 'register'])->name('regiter');

Route::middleware('authentication')->group(function(){
    Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');
    Route::get('/cmessage', [ProjectController::class, 'cmessage'])->name('cmessage');
    Route::post('/send', [ProjectController::class, 'send'])->name('send');
    Route::get('/logout', [ProjectController::class, 'logout'])->name('logout');
    Route::get('/read/{id}', [ProjectController::class, 'read'])->name('read');
    Route::get('/updatepage/{id}', [ProjectController::class, 'updatepage'])->name('updatepage');
    Route::put('/update/{id}', [ProjectController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');



});