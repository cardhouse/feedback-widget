<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TwitchOauthController;
use App\Http\Controllers\SongController;
use App\Http\Livewire\FeedbackWidget;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/twitch/login', [TwitchOauthController::class, 'authenticate']);
Route::get('/twitch/oauth/return', [TwitchOauthController::class, 'callback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('local')
    ->get('/force/{user}', function (App\Models\User $user) {
        Auth::login($user);
        return redirect('/dashboard');
    }
);

Route::prefix('songs')->middleware('auth')->group(function () {
    Route::get('/', [SongController::class, 'index'])->name('songs');
    Route::get('/create', [SongController::class, 'create']);
    Route::post('/', [SongController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/feedback', FeedbackWidget::class)->name('feedback');
    Route::get('/feedback/clear', [FeedbackController::class, 'clear']);
    Route::post('/feedback', [FeedbackController::class, 'submit']);
    Route::get('/{username}', [FeedbackController::class, 'show']);
});

