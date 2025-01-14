<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;



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

    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show'); // عرض الملف الشخصي

// الملف الشخصي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // حذف الحساب
});

// الصفحة الرئيسية بعد تسجيل الدخول
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// المسارات المستخدمين
Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.makeAdmin');
        Route::post('/users/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.removeAdmin');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });

    

    // Route::middleware(['auth'])->group(function () {
    //     Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // });


    //Email verification
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home'); // تعديل المسار حسب الحاجة
    })->middleware(['auth', 'signed'])->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    //Search for a profile
    Route::get('/search', [ProfileController::class, 'search'])->name('profile.search');


    // Recipes
// عرض جميع الوصفات (لعرض صفحة الوصفات العامة)
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

// عرض وصفة محددة (لعرض التفاصيل لكل وصفة)
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

// عرض وصفات حسب الفئة (للفئات المختلفة مثل Lunch، Dessert)
Route::get('/recipes/category/{category}', [RecipeController::class, 'category'])->name('recipes.category');

// مسارات التعديلات الخاصة بالمديرين فقط
Route::middleware(['auth', 'admin'])->group(function () {
    // إضافة وصفة جديدة
    
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
        Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    }); 
    
   
    
    // تعديل وصفة
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
    
    // حذف وصفة
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

