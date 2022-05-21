<?php

use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::prefix('thread')->group(function () {
    Route::get('create', [ThreadController::class, 'create'])->name('thread.create');
    Route::post('store', [ThreadController::class, 'store'])->name('thread.store');
    Route::get('{thread}', [ThreadController::class, 'show'])->name('thread.show');
    // Route::get('edit/{thread}', [ThreadController::class, 'edit'])->name('thread.edit');
    // Route::post('update/{thread}', [ThreadController::class, 'update'])->name('thread.update');
});