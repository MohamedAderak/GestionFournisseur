<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserControlle;

// Route to show the login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
Route::post('/signup', [LoginController::class, 'SignupSubmit'])->name('signup.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/404', function () {
    return view('pages.404');
})->name('404');



// Protected routes that require authentication
Route::middleware(['auth', 'RoleCheck'])->group(function () {
    // Route for the admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
    Route::get('/clients', [AdminController::class, 'users'])->name('admin_dashboard.users');
    Route::resource('client', UserController::class);

    Route::get('/stock', [AdminController::class, 'stock'])->name('admin_dashboard.stock');
    Route::resource('/produit', StockController::class);

    Route::get('/demandes', [AdminController::class, 'demandes'])->name('admin_dashboard.demandes');
    Route::get('/accepted', [AdminController::class, 'accepted'])->name('admin_dashboard.accepted');
    Route::get('/rufused', [AdminController::class, 'rufused'])->name('admin_dashboard.rufused');
    

    Route::delete('/deletedemande/{id}', [AdminController::class, 'deletedemande'])->name('demende.destroy');
    Route::post('/accept/{id}', [AdminController::class, 'accept'])->name('accept.demande');
    Route::post('/refuse/{id}', [AdminController::class, 'refuse'])->name('refuse.demande');
    
});



Route::middleware(['auth', 'UserCheck'])->group(function () {
    Route::get('/Client', [UserControlle::class, 'index'])->name('user_dashboard');
    Route::get('/Client/create', [UserControlle::class, 'create'])->name('user_dashboard.create');
    Route::post('/demande', [UserControlle::class, 'store'])->name('demande.store');
    Route::delete('/delete/{id}', [UserControlle::class, 'destroy'])->name('demende.delete');
    Route::get('/demandeaccepted', [UserControlle::class, 'accepted'])->name('user_dashboard.accepted');
    Route::get('/demanderefused', [UserControlle::class, 'refused'])->name('user_dashboard.rufused');
});

