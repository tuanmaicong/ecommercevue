<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SizeController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin.index');
});
//Profile
Route::get('/profile',[ProfileController::class,'index']);
Route::post('/save-profile',[ProfileController::class,'store']);

//Home banner
Route::get('/home_banner',[HomeBannerController::class,'index']);
Route::post('/updateHomeBanner',[HomeBannerController::class,'store']);

//Size
Route::get('/manage_size',[SizeController::class,'index']);
Route::post('/updateSize',[SizeController::class,'store']);

//Color
Route::get('/manage_color',[ColorController::class,'index']);
Route::post('/updateColor',[ColorController::class,'store']);

//Attribute
Route::get('/attribute_name',[AttributeController::class,'index_attribute_name']);
Route::post('/update_attribute_name',[AttributeController::class,'store_attribute_name']);

Route::get('/attribute_value',[AttributeController::class,'index_attribute_value']);
Route::post('/update_attribute_value',[AttributeController::class,'store_attribute_value']);

//Delete data
Route::get('/deleteData/{id?}/{table?}',[DashboardController::class,'deleteData']);
