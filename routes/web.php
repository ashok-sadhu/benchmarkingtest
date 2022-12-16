<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\QrcodeController;
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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['guest']], function() {
	Route::get('/', [CustomAuthController::class, 'index'])->name('login');
	Route::get('login', [CustomAuthController::class, 'index'])->name('login');
	Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
	Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
	Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

});

Route::group(['middleware' => ['auth']], function() {
	Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
	Route::any('logout', [CustomAuthController::class, 'signOut'])->name('logout');
	Route::post('generateqr', [QrcodeController::class, 'generateqr'])->name('generateqr');
});