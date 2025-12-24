<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TestimonialController;


use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\OtpVerificationController;


Route::get('/',                [PageController::class, 'home'])->name('home');
Route::get('/about',           [PageController::class, 'about'])->name('about');
Route::get('/services',        [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceShow'])->name('services.show');
Route::get('/projects',        [PageController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [PageController::class, 'projectShow'])->name('projects.show');
Route::get('/reviews',         [PageController::class, 'reviews'])->name('reviews');

Route::get('/contact',         [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact',        [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');




Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', AdminProjectController::class);
});
// Admin routes (projects CRUD), only for logged-in users
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('projects', AdminProjectController::class);
    });

// Dashboard routes (also only for logged-in users)
Route::middleware('auth')->group(function () {

    // When admin goes to /dashboard, show the projects index page
    Route::get('/dashboard', function () {
        return redirect()->route('admin.projects.index');
    })->name('dashboard');

});


Route::middleware('auth')->group(function () {
    // ... your other routes (dashboard, admin etc.)

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Show login form
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

// Handle login POST
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Route::post('/logout', function () {
//     Auth::logout();
//     request()->session()->invalidate();
//     request()->session()->regenerateToken();

//     return redirect('/');
// })->name('logout');

// If you use Breeze/Jetstream make sure this is at the bottom:
// require __DIR__.'/auth.php';




// already have:
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');

// add this:
Route::post('/reviews', [TestimonialController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');




// NEW: Contact (support)
Route::get('/contactweb',     [PageController::class, 'contactT'])->name('contactT');




Route::get('/auth/google/redirect', [SocialLoginController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [SocialLoginController::class, 'callback']);



Route::middleware('guest')->group(function () {
    // ...
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

        // OTP verification after registration
    Route::get('verify-otp', [OtpVerificationController::class, 'show'])
        ->name('otp.show');
    Route::post('verify-otp', [OtpVerificationController::class, 'verify'])
        ->name('otp.verify');

});


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('projects', AdminProjectController::class);
    });

    Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.projects.index');
    }

    return view('dashboard'); // normal user dashboard
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';