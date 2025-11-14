<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;

Route::get('/', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
Route::post('/chat/clear', [ChatController::class, 'clear'])->name('chat.clear');
