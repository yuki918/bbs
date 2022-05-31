<?php

use App\Http\Controllers\User\ThreadController;
use Illuminate\Support\Facades\Route;

Route::prefix('thread')->group(function () {
    Route::get('create', [ThreadController::class, 'create'])->name('thread.create');
    Route::post('store', [ThreadController::class, 'store'])->name('thread.store');
    Route::get('{thread}', [ThreadController::class, 'show'])->name('thread.show');
    Route::get('{thread}/edit', [ThreadController::class, 'edit'])->name('thread.edit');
    Route::post('{thread}/update', [ThreadController::class, 'update'])->name('thread.update');

    // Route::get('{thread}', [CommentController::class, 'index'])->name('comment.index');
    // Route::get('{thread}', [CommentController::class, 'create'])->name('comment.create');
    // Route::post('{thread}', [CommentController::class, 'store'])->name('comment.store');
});