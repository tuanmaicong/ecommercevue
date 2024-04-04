<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/profile',[ProfileController::class,'index']);
Route::post('/save-profile',[ProfileController::class,'store']);
