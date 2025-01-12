<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// مسارات المصادقة
Auth::routes();

// الصفحة الرئيسية
Route::get('/', [PagesController::class, 'index'])->name('home');

// لوحة التحكم
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// مسارات الأخبار
Route::middleware(['auth', 'admin'])->group(function () {
    

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});
// Route to display the edit form
Route::get('/news/{slug}/edit', [NewsController::class, 'edit'])->name('news.edit');

// Route to handle the update submission
Route::put('/news/{slug}', [NewsController::class, 'update'])->name('news.update');


    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::put('/news/{slug}', [NewsController::class, 'update'])->name('news.update');


// الملف الشخصي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// الصفحة الرئيسية بعد تسجيل الدخول
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
