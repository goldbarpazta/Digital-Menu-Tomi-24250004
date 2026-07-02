<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [FrontendMenuController::class, 'index'])->name('frontend.menus.index');
Route::get('/menu/{slug}', [FrontendMenuController::class, 'show'])->name('frontend.menus.show');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/menus/data', [AdminMenuController::class, 'data'])->name('menus.data');
    Route::resource('menus', AdminMenuController::class)->except(['show']);
    Route::get('/menus/{menu}', [AdminMenuController::class, 'show'])->name('menus.show');
    Route::patch('/menus/{menu}/toggle-status', [AdminMenuController::class, 'toggleStatus'])->name('menus.toggle-status');

    Route::get('/reviews/data', [AdminReviewController::class, 'data'])->name('reviews.data');
    Route::resource('reviews', AdminReviewController::class)->except(['show', 'edit', 'update']);
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
