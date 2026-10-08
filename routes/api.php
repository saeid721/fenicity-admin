<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\SearchController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ResourceController;
Route::prefix('v1')->middleware('throttle:api')->group(function(){
 Route::get('/home',[HomeController::class,'index']); Route::get('/settings',[HomeController::class,'settings']); Route::get('/categories',[HomeController::class,'categories']); Route::get('/external-links',[HomeController::class,'links']);
 Route::get('/pages/{slug}',[HomeController::class,'page']); Route::get('/search',[SearchController::class,'index']);
 Route::prefix('auth')->group(function(){Route::post('/register',[AuthController::class,'register']);Route::post('/login',[AuthController::class,'login']);Route::post('/forgot-password',[AuthController::class,'forgotPassword']);Route::post('/reset-password',[AuthController::class,'resetPassword']);});
 Route::middleware('auth:sanctum')->group(function(){Route::post('/auth/logout',[AuthController::class,'logout']);Route::get('/me',[AuthController::class,'me']);Route::put('/me',[AuthController::class,'update']);});
 Route::get('/{resource}',[ResourceController::class,'index'])->where('resource','doctors|hospitals|diagnostic-centers|hotels|restaurants|shopping-centers|service-providers|educational-institutes|teachers|entrepreneurs|parlours|jobs|news|tourist-places|gardens|videos|events|rental-properties|land|vehicles|blood|bus|train|emergency-services|fire-services|courier-services|electricity-offices|police-stations|nursery|services|notifications');
 Route::get('/{resource}/{slug}',[ResourceController::class,'show'])->where('resource','doctors|hospitals|diagnostic-centers|hotels|restaurants|shopping-centers|service-providers|educational-institutes|teachers|entrepreneurs|parlours|jobs|news|tourist-places|gardens|videos|events|rental-properties|land|vehicles|blood|bus|train|emergency-services|fire-services|courier-services|electricity-offices|police-stations|nursery|services|notifications');
});
