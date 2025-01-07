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

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');

    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');



// الملف الشخصي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// الصفحة الرئيسية بعد تسجيل الدخول
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
