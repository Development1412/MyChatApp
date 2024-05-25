<?php

use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Models\ChatRoom;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chat', [ChatRoomController::class, 'index']);
    Route::post('/message', [CommentController::class, 'sendMessage'])->name('message.send');
    Route::get('fetch-message/{roomId}', [CommentController::class, 'fetchMessage'])->name('message.fetch');
});



require __DIR__.'/auth.php';
