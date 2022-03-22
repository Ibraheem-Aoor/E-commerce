<?php

use App\Http\Controllers\Api\AdminProfileController;
use App\Http\Controllers\Api\AuthTokenController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SocialLinksSettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Sanctum Auth Routes.
Route::middleware('auth:sanctum')->group(function()
{
    // Admin Api Routes.
    Route::group(['middleware' => ['authAdminSanctum']  , 'prefix'=>'admin'] , function()
    {
        Route::apiResource('/profiles' , AdminProfileController::class)->middleware('ownerOnly');
        Route::apiResource('/categories' , CategoryController::class);
        Route::apiResource('/products' , ProductController::class);
        Route::apiResource('/coupons' , CouponController::class);
        Route::apiResource('/social-links' , SocialLinksSettingsController::class);
    });

    // Any Auth User Api Routes.
    Route::apiResource('/orders' , OrderController::class);
    Route::get('/auth/tokens' , [AuthTokenController::class , 'index']);
    Route::get('/auth/delete/{id}' , [AuthTokenController::class , 'destroy']);
    Route::get('/auth/logout' , [AuthTokenController::class , 'logout']);
    Route::get('/auth/delete-all' , [AuthTokenController::class , 'destroyAll']);

});


// Sanctum Guest Routes.
Route::middleware('guest:sanctum')->group(function()
{
    Route::post('/guest/login' , [AuthTokenController::class  , 'generateToken']);
});

