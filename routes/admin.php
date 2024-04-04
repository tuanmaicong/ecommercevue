<?php

use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/profile',[ProfileController::class,'index']);
Route::post('/save-profile',[ProfileController::class,'store']);
Route::get('/home_banner',[HomeBannerController::class,'index']);
