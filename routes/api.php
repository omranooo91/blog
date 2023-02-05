<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SettingController;
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

Route::get('/',function (){
   return 'Welcome to API From Post man';
});

Route::get('/settings',[SettingController::class,'index']);
Route::get('/categories',[CategoriesController::class,'index']);
Route::get('/categories_with_posts',[CategoriesController::class,'categgoryWithPosts']);

Route::post('/login',[LoginController::class,'login']);

