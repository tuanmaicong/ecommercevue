<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ImageConvertController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TaxController;
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

//Category
Route::get('/category',[CategoryController::class,'index']);
Route::post('/update_category',[CategoryController::class,'store']);

Route::get('/category_attribute',[CategoryController::class,'index_category_attribute']);
Route::post('/update_category_attribute',[CategoryController::class,'store_category_attribute']);

//Brand
Route::get('/brand',[BrandController::class,'index']);
Route::post('/update_brand',[BrandController::class,'store']);

//Tax
Route::get('/tax',[TaxController::class,'index']);
Route::post('/update_tax',[TaxController::class,'store']);

//Product
Route::get('/product',[ProductController::class,'index']);
Route::get('/manage_product/{id?}',[ProductController::class,'view_product']);
Route::post('/update_product',[ProductController::class,'store']);
Route::post('/get_attribute',[ProductController::class,'get_attribute']);
Route::post('/removeAttrId',[ProductController::class,'removeAttrId']);

//Delete data
Route::get('/deleteData/{id?}/{table?}',[DashboardController::class,'deleteData']);

//Convert image
Route::get('/convert-image',[ImageConvertController::class,'convertToWebP']);
