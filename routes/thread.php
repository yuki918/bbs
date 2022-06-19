<?php

use App\Http\Controllers\User\ThreadController;
use App\Http\Controllers\User\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('thread')->group(function () {
    Route::get('/', [ThreadController::class, 'index'])->name('thread.index');
    Route::get('create', [ThreadController::class, 'create'])->name('thread.create');
    Route::post('store', [ThreadController::class, 'store'])->name('thread.store');
    Route::get('{thread}', [ThreadController::class, 'show'])->name('thread.show');
    Route::get('{thread}/edit', [ThreadController::class, 'edit'])->name('thread.edit');
    Route::post('{thread}/update', [ThreadController::class, 'update'])->name('thread.update');
    Route::post('{thread}/destroy', [ThreadController::class, 'destroy'])->name('thread.destroy');
    
    Route::post('{thread}/comment', [CommentController::class, 'store'])->name('comment.store');
});