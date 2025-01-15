<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;


// Authentication Routes
Auth::routes();

// الصفحة الرئيسية
Route::get('/', [PagesController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');








//Profile routes
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show'); 

Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

   //Search for a profile
Route::get('/search', [ProfileController::class, 'search'])->name('profile.search');


//Users management routes
Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.makeAdmin');
        Route::post('/users/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.removeAdmin');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    

    // Route::middleware(['auth'])->group(function () {
    //     Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // });


    //Email verification
    // Route::get('/email/verify', function () {
    //     return view('auth.verify-email');
    // })->middleware('auth')->name('verification.notice');
    
    // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    //     $request->fulfill();
    //     return redirect('/home'); // تعديل المسار حسب الحاجة
    // })->middleware(['auth', 'signed'])->name('verification.verify');
    
    // Route::post('/email/verification-notification', function (Request $request) {
    //     $request->user()->sendEmailVerificationNotification();
    //     return back()->with('status', 'verification-link-sent');
    // })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    
// News Routes

Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');

// Route to display the edit form
Route::get('/news/{slug}/edit', [NewsController::class, 'edit'])->name('news.edit');

// Route to handle the update submission
Route::put('/news/{slug}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/news/{slug}', [NewsController::class, 'destroy'])->name('news.destroy');

});
//Recipes management routes
Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
        Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
        Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
        Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update'); 
        Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
 });
    // Recipes routes

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/recipes/category/{category}', [RecipeController::class, 'category'])->name('recipes.category');
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
 
 //Search for a recipe

 

// FAQ Routes
Route::get('/faqs', [FAQController::class, 'index'])->name('faqs.index');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/faqs/create', [FAQController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FAQController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{id}/edit', [FAQController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{id}', [FAQController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{id}', [FAQController::class, 'destroy'])->name('faqs.destroy');
});



// Contact Form

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
