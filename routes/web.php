<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/meilisearch', function () {
    return view('meilisearch');
})->name('meilisearch');

Route::resource('/', JobController::class)->names([
    'index' => 'job.index',
    'create' => 'job.create',
    'store' => 'job.store',
    'show' => 'job.show',
    'edit' => 'job.edit',
    'update' => 'job.update',
    'delete' => 'job.delete',
])->except('job.index')->middleware('auth');

Route::get('/search', SearchController::class)->name('search');

Route::get('/tags/{tag:name}', TagController::class)->name('tag');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
