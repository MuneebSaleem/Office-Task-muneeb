<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\EmailController;

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

Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('services', ServiceController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('mailing', EmailController::class);
    // sent item
    Route::get('mailing-system/sent-item', [EmailController::class, 'sentItem'])->name('sent-item');
    // Inbox
    Route::get('mailing-system/inbox', [EmailController::class, 'inboxItem'])->name('inbox');

    Route::get('stripe', [StripeController::class, 'stripe'])->name('stripe');
    Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

});