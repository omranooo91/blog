<?php

use App\Http\Controllers\Dashboard\Auth;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\PostsController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[HomeController::class,'index'])->name('homePage');
Route::get('category/{id}',[CategoryController::class,'index'])->name('category');
Route::get('post/{id}',[PostController::class,'index'])->name('post');



Route::get('/login',[Auth::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/register',[Auth::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/registerUser',[Auth::class,'registerUser'])->name('registerUser');
Route::post('/loginUser',[Auth::class,'loginUser'])->name('loginUser');
Route::get('/logout',[Auth::class,'logout'])->name('logout');
Route::get('/admin',[Auth::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/users',[UserController::class,'index'])->name('user')->middleware('isLoggedIn');
Route::get('/userAdd',[UserController::class,'create'])->name('userAdd')->middleware('isLoggedIn');
Route::post('/userStore',[UserController::class,'store'])->name('userStore')->middleware('isLoggedIn');
Route::get('/userEdit/{id}',[UserController::class,'edit'])->name('userEdit')->middleware('isLoggedIn');
Route::get('/userDelete/{id}',[UserController::class,'destroy'])->name('userDelete')->middleware('isLoggedIn');
Route::post('/userUpdate/{id}',[UserController::class,'update'])->name('userUpdate')->middleware('isLoggedIn');
Route::get('/categories',[CategoriesController::class,'index'])->name('categories')->middleware('isLoggedIn');
Route::get('/categoryAdd',[CategoriesController::class,'create'])->name('categoryAdd')->middleware('isLoggedIn');
Route::post('/categoryStore',[CategoriesController::class,'store'])->name('categoryStore')->middleware('isLoggedIn');
Route::get('/categoryDelete/{id}',[CategoriesController::class,'destroy'])->name('categoryDelete')->middleware('isLoggedIn');
Route::get('/editCategory/{id}',[CategoriesController::class,'edit'])->name('editCategory')->middleware('isLoggedIn');
Route::post('/updateCategory/{id}',[CategoriesController::class,'update'])->name('updateCategory')->middleware('isLoggedIn');
Route::get('/posts',[PostsController::class,'index'])->name('posts')->middleware('isLoggedIn');
Route::get('/postAdd',[PostsController::class,'create'])->name('postAdd')->middleware('isLoggedIn');
Route::post('/postStore',[PostsController::class,'store'])->name('postStore')->middleware('isLoggedIn');
Route::get('/postEdit/{id}',[PostsController::class,'edit'])->name('postEdit')->middleware('isLoggedIn');
Route::get('/postDelete/{id}',[PostsController::class,'destroy'])->name('postDelete')->middleware('isLoggedIn');
Route::post('/updatePost/{id}',[PostsController::class,'update'])->name('updatePost')->middleware('isLoggedIn');

Route::get('/settings', function () {
    return view('dashboard.settings');
})->name('dashboard.settings')->middleware('isLoggedIn');
Route::post('dashboard/settings/update/{settings}',[SettingController::class,'update'])->name('settings.update');



