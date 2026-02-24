<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PlotController as AdminPlotController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\SiteVisitController as AdminSiteVisitController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\PlotController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PageController;
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

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/plots', [PlotController::class, 'index'])->name('plots.index');
Route::get('/projects/{project}/{plot}', [PlotController::class, 'show'])->name('plots.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/location', [PageController::class, 'location'])->name('location');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authenticated Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Projects routes
    Route::resource('projects', AdminProjectController::class);
    
    // Plots routes
    Route::resource('plots', AdminPlotController::class);
    Route::patch('plots/{plot}/change-status', [AdminPlotController::class, 'changeStatus'])->name('plots.changeStatus');

    // Lead Management routes
    Route::resource('leads', AdminLeadController::class);
    Route::patch('leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.updateStatus');
    Route::patch('leads/{lead}/notes', [AdminLeadController::class, 'updateNotes'])->name('leads.updateNotes');

    // Site Visit Booking routes
    Route::resource('site-visits', AdminSiteVisitController::class);
    Route::patch('site-visits/{siteVisit}/status', [AdminSiteVisitController::class, 'updateStatus'])->name('site-visits.updateStatus');
});

require __DIR__.'/auth.php';
