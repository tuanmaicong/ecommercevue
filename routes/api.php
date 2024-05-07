<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\HomePageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']],function (){
    Route::get('/user',function (Request $request){
        return $request->user();
    });
    Route::post('/updateUser', [AuthController::class, 'updateUser']);
    Route::post('/auth/logout',function (Request $request){
        prx($request->all());
        \auth()->user()->tokens()->delete();
        return [
            'message' => 'Tokens Revoked'
        ];
    });
});

//Front-end Data
Route::get('/getHomeData', [HomePageController::class, 'getHomeData']);
Route::get('/getCategoriesData', [HomePageController::class, 'getCategoriesData']);
Route::get('/getAllProductData', [HomePageController::class, 'getAllProductData']);
Route::post('/getCategoryData', [HomePageController::class, 'getCategoryData']);
Route::post('/getShopData', [HomePageController::class, 'getShopData']);
Route::get('/getProductData/{item_code}/{slug}', [HomePageController::class, 'getProductData']);
Route::post('/getUserData', [HomePageController::class, 'getUserData']);
Route::post('/getCartData', [HomePageController::class, 'getCartData']);
Route::post('/addToCart', [HomePageController::class, 'addToCart']);
Route::post('/removeCartData', [HomePageController::class, 'removeCartData']);
