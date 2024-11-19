<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::name('todo.')->group(function () {
        Route::prefix('todo')->group(function () {
            Route::get('/create', [App\Http\Controllers\todo\CreateController::class, 'index'])->name('create');
            Route::post('/create', [App\Http\Controllers\todo\CreateController::class, 'create'])->name('create');
            Route::get('/complete/{id}', [App\Http\Controllers\todo\CompleteController::class,'complete'])->name('complete');
            Route::get('/complete/undo/{id}', [App\Http\Controllers\todo\CompleteController::class,'undo'])->name('complete.undo');
            Route::get('/edit/{id}', [App\Http\Controllers\todo\EditController::class,'index'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\todo\EditController::class,'edit'])->name('edit');
            Route::get('/delete/{id}', [App\Http\Controllers\todo\DeleteController::class,'delete'])->name('delete');
            Route::get('/delete/undo/{id}', [App\Http\Controllers\todo\DeleteController::class,'undo'])->name('delete.undo');
            Route::get('/delete/force/{id}', [App\Http\Controllers\todo\DeleteController::class,'forceDelete'])->name('delete.force');
            Route::get('/list/completed', [App\Http\Controllers\todo\ListController::class,'getCompleted'])->name('list.completed');
            Route::get('/list/deleted', [App\Http\Controllers\todo\ListController::class,'getDeleted'])->name('list.deleted');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
