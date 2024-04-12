<?php

use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Web as Web;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'posts');
Route::resource('posts', Web\PostController::class);
Route::resource('comments', Web\CommentController::class)
    ->only(['store', 'update', 'destroy'])->middleware('auth');

Route::group(['prefix' => 'subscriptions', 'as' => 'subscriptions.'], function () {
    Route::post('/', [Web\SubscriptionController::class, 'store'])->name('store');
    Route::delete('/', [Web\SubscriptionController::class, 'destroy'])->name('destroy');
});

Route::get('admin', [Admin\AdminController::class, 'index'])
    ->name('admin.index')->middleware('admin', 'auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
