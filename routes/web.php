<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/note')->name('dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard'); //here, there are two middlewares- the auth middleware checks if the user is authenticated and the verified middleware checks if the user is verified. If one of them is not satisfied, then we cant access the dashboard page.

Route::middleware(['auth', 'verified'])->group(function () { //here, there are two middlewares- the auth middleware checks if the user is authenticated and the verified middleware checks if the user is verified. If one of them is not satisfied, then we cant access the note routes that are specified below / is specified by the single line at the bottom


    // Route::get('/note', [NoteController::class, 'index'])->name('note.index');
// Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
// Route::post('/note', [NoteController::class, 'store'])->name('note.store');
// Route::get('note/{id}', [NoteController::class, 'show'])->name('note.show');
// Route::get('note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
// Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
// Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

    Route::resource('note', NoteController::class);
});

Route::middleware('auth')->group(function () {  //the middle waregroup, which has the routes. The user needs to be authenticated in order to access the profile page specified below
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
