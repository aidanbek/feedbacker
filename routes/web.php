<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::middleware('can:client')->group(function () {
        Route::get('feedback', [App\Http\Controllers\Client\FeedbackController::class, 'create'])->name('client.feedback.create');
        Route::post('feedback', [App\Http\Controllers\Client\FeedbackController::class, 'store'])->name('client.feedback.store');
    });

    Route::middleware('can:manager')->group(function () {
        Route::get('feedbacks', [App\Http\Controllers\Manager\FeedbackController::class, 'index'])->name('manager.feedbacks.index');
        Route::post('feedbacks/{id}/answered', [App\Http\Controllers\Manager\FeedbackController::class, 'markAsAnswered'])->name('manager.feedbacks.markAsAnswered');
        Route::get('feedbacks/{id}/attachment', [App\Http\Controllers\Manager\FeedbackController::class, 'downloadAttachment'])->name('manager.feedbacks.downloadAttachment');
    });
});
