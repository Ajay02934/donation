<?php

use App\Http\Controllers\{AuthController,BookingController,DashboardController,DonationController,PujaController,SiteController};
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class,'home'])->name('home');
Route::get('/pujas', [PujaController::class,'index'])->name('pujas.index');
Route::get('/pujas/{puja:slug}', [PujaController::class,'show'])->name('pujas.show');
Route::get('/services', [SiteController::class,'services'])->name('services');
Route::get('/posts', [SiteController::class,'posts'])->name('posts');
Route::get('/astrology', [SiteController::class,'astrology'])->name('astrology');
Route::get('/astrologers', [SiteController::class,'astrologers'])->name('astrologers');
Route::get('/mahakal-darshan', [SiteController::class,'mahakal'])->name('mahakal.darshan');
Route::get('/contact', [SiteController::class,'contact'])->name('contact');
Route::post('/contact', [SiteController::class,'contactStore'])->middleware('throttle:6,1')->name('contact.store');

// Booking — public (no login required)
Route::get('/book-puja/{puja:slug}', [BookingController::class,'create'])->name('bookings.create');
Route::post('/book-puja', [BookingController::class,'store'])->middleware('throttle:10,1')->name('bookings.store');
Route::get('/bookings/{booking}', [BookingController::class,'show'])->name('bookings.show');

// Auth — guest only
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class,'showRegister'])->name('register');
    Route::post('/register', [AuthController::class,'register'])->name('register.store');
    Route::get('/login', [AuthController::class,'showLogin'])->name('login');
    Route::post('/login', [AuthController::class,'login'])->middleware('throttle:6,1')->name('login.store');
});

Route::post('/logout', [AuthController::class,'logout'])->middleware('auth')->name('logout');

// Authenticated area
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/donation/checkout', [DonationController::class,'checkout'])->name('donation.checkout');
    Route::get('/donation/success', [DonationController::class,'success'])->name('donation.success');
});
