<?php

use App\Http\Controllers\noteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [welcomeController::class,'welcome'])->name('welcome');
Route::redirect('/','note')->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    

// Route::get('/note', [noteController::class,'index'])->name('note.index');
// Route::get('/note/create', [noteController::class,'create'])->name('note.create');
// Route::post('/note/create', [noteController::class,'store'])->name('note.store');
// Route::get('/note/{id}', [noteController::class,'show'])->name('note.show');
// Route::get('/note/{id}/edit', [noteController::class,'edit'])->name('note.edit');
// Route::put('/note/{id}', [noteController::class,'update'])->name('note.update');
// Route::delete('/note/{id}', [noteController::class,'destroy'])->name('note.destroy');

Route::resource('note',noteController::class); // This line of code generate all the other routes commected above.

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
