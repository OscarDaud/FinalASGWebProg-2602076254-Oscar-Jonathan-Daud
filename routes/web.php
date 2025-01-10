<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [ViewController::class, 'anon_home'])->name('anon.home');
Route::get('/register', [ViewController::class, 'anon_register'])->name('anon.register');
Route::get('/payment', [ViewController::class, 'anon_payment'])->name('anon.payment');
Route::get('/login', [ViewController::class, 'anon_login'])->name('anon.login');
Route::post('/api/register', [UserController::class, 'register'])->name('api.register');
Route::post('/api/pay', [UserController::class, 'pay'])->name('api.pay');
Route::post('/api/login', [UserController::class, 'login'])->name('api.login');
Route::get('/api/logout', [UserController::class, 'logout'])->name('api.logout');
Route::put('/api/top_up', [UserController::class, 'top_up'])->name('api.top_up');
Route::post('/api/wishlist', [WishlistController::class, 'create'])->name('api.wishlist.create');
Route::delete('/api/wishlist/{wishlist_id}', [WishlistController::class, 'delete'])->name('api.wishlist.delete');
Route::post('/api/chat', [ChatController::class, 'create'])->name('api.chat.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ViewController::class, 'user_home'])->name('user.home');
    Route::get('/chat', [ViewController::class, 'user_chat'])->name('user.chat');
    Route::get('/chat/{chat_room_id}', [ViewController::class, 'user_chat_detail'])->name('user.chat_detail');
    Route::get('/friend', [ViewController::class, 'friend'])->name('user.friend');
    Route::get('/top_up', [ViewController::class, 'top_up'])->name('user.top_up');
});

Route::post('/locale', function (Request $req) {
    Session::put('locale', $req->locale);
    return back();
})->name('locale');