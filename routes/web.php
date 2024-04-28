<?php

use App\Http\Controllers\Front\HomePageController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
//    return redirect('admin/dashboard');
});

Route::get('/login',function (){
    return view('auth.signin');
});

Route::get('/apiDocs',function (){
    return view('apiDocs');
});

Route::post('/login_user',[AuthController::class,'loginUser']);
Route::get('/changeSlug',[HomePageController::class,'changeSlug']);

Route::get('/logout',function (){
    Auth::logout();
    return redirect('login');
})->name('user.logout');

Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');
