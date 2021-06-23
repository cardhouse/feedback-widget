<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TwitchOauthController;
use App\Http\Livewire\FeedbackWidget;

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
});

Route::get('/feedback/submit', [FeedbackController::class, 'create'])
    ->middleware('auth');
Route::post('/feedback', [FeedbackController::class, 'store'])->middleware('auth');

Route::prefix('songs')->middleware('auth')->group(function () {
    Route::get('/', [SongController::class, 'index'])->name('songs');
    Route::get('/create', [SongController::class, 'create']);
    Route::post('/', [SongController::class, 'store']);
});


Route::get('/twitch/login', [TwitchOauthController::class, 'authenticate']);
Route::get('/twitch/oauth/return', [TwitchOauthController::class, 'callback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/force/{user}', function (App\Models\User $user) {
    Auth::login($user);
    return $user;
});

Route::middleware('auth')->group(function () {
    // Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback', FeedbackWidget::class)->name('feedback');
    Route::get('/feedback/clear', [FeedbackController::class, 'clear']);
    Route::post('/feedback', [FeedbackController::class, 'submit']);
    Route::get('/{username}', [FeedbackController::class, 'show']);
});

