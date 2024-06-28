<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ShowCategoriesController;

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
    return view('posts', [
        'active' => 'posts',
        'title' => 'HomePage',
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))
            ->paginate(5)->withQueryString(),
    ]);
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

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'List Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

// invokable controller
Route::get('/categories/invoke', ShowCategoriesController::class)->name('categories.index');

// Route Comments
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware(['auth', 'verified']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware(['auth', 'verified']);

// Login and Register Form
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard Panel
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('admin');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Show User in Dashboard
Route::get('dashboard/users', [DashboardPostController::class, 'showUser'])->middleware('auth', 'admin')->name('users');
Route::delete('/dasboard/{user}', [DashboardPostController::class, 'deleteUser'])->middleware('auth', 'admin')->name('delete.user');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Email verification
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::post('/email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
