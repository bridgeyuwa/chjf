<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\GetInvolvedController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PrayerRequestController;
use App\Http\Controllers\ImpactReportController;
use App\Http\Controllers\AnnualReportController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Get Involved (hub + sub-pages)
Route::get('/get-involved', [GetInvolvedController::class, 'index'])->name('get-involved.index');
Route::get('/get-involved/volunteer', [VolunteerController::class, 'index'])->name('get-involved.volunteer');
Route::post('/get-involved/volunteer', [VolunteerController::class, 'store'])->name('volunteer.store');
Route::get('/get-involved/donate', [DonateController::class, 'index'])->name('get-involved.donate');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Prayer Request
Route::get('/prayer-request', [PrayerRequestController::class, 'index'])->name('prayer-request');
Route::post('/prayer-request', [PrayerRequestController::class, 'store'])->name('prayer.store');

// Blog
Route::get('/stories', [BlogController::class, 'index'])->name('blog.index');
Route::get('/stories/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Events
Route::get('/events', [EventsController::class, 'index'])->name('events.index');
Route::get('/events/{event:slug}', [EventsController::class, 'show'])->name('events.show');

// Impact & Annual Reports
Route::get('/impact-report', [ImpactReportController::class, 'index'])->name('impact-report');
Route::get('/annual-report', [AnnualReportController::class, 'index'])->name('annual-report');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.store');
