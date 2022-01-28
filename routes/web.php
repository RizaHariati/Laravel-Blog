<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;



Route::get('/', function () {
    return view("main.home", [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view("main.about", [
        'title' => 'About',
        'active' => 'about'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [PostController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class,'logout']);

Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/dashboard', function ()
{
    return view("dashboard.dashboard",[
        "title"=>"Dashboard " . auth()->user()->name ,
    ]);

})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostsController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminController::class)->middleware("admin");
