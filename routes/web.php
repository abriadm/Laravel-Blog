<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', ['active' => 'home', 'title' => 'HomePage']);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Us',
        'active' => 'about',
        'img' => 'profile-3.JPG',
        'name' => 'Giveonaldo',
        'age' => 21,
        'status' => 'Working from Mars',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post in " . $category->name,
        'active' => $category->slug,
        'posts' => $category->posts->load('category', 'user'),
    ]);
});

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'List Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

// Login and Register Form
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard Panel
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');