<?php

use App\Http\Controllers\CarouselImageController;
use App\Http\Controllers\ProjectListController;
use App\Models\CarouselImage;
use App\Models\Partner;
use App\Models\ProjectList;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\HomepageController;


// Public routes
Route::get('/', function () {
    $images = CarouselImage::where('is_active', true)->get();
    $projects = ProjectList::all();
    $partners = Partner::all();
    return view('home', compact('images', 'projects', 'partners'));
})->name('home');
Route::get('/portfolio/filter', [PortfolioController::class, 'filter'])->name('portfolio.filter');


Route::get('/projects/{id}', [ProjectListController::class, 'show'])->name('projects.show');
Route::get('/portfolio', [PortfolioController::class, 'public'])->name('portfolio');
Route::get('/portfolio/content/{id}', [PortfolioController::class, 'show'])->name('portfolio.content');
Route::resource('partners', PartnerController::class);
Route::resource('tags', TagController::class);
Route::get('/', [HomepageController::class, 'index'])->name('home');


// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Carousel routes
    Route::get('/carousel/create', [CarouselImageController::class, 'create'])->name('carousel.create');
    Route::get('/carousel', [CarouselImageController::class, 'index'])->name('carousel.index');
    Route::post('/carousel', [CarouselImageController::class, 'store'])->name('carousel.store');
    Route::delete('/carousel/{id}', [CarouselImageController::class, 'destroy'])->name('carousel.destroy');
    Route::patch('/carousel/toggle/{id}', [CarouselImageController::class, 'toggleActive'])->name('carousel.toggleActive');

    // Project routes
    Route::get('/editprojects', [ProjectListController::class, 'index'])->name('projects.index');
    Route::get('/editprojects/create', [ProjectListController::class, 'create'])->name('projects.create');
    Route::post('/editprojects', [ProjectListController::class, 'store'])->name('projects.store');
    Route::get('/editprojects/{id}/edit', [ProjectListController::class, 'edit'])->name('projects.edit');
    Route::put('/editprojects/{id}', [ProjectListController::class, 'update'])->name('projects.update');
    Route::delete('/editprojects/{id}', [ProjectListController::class, 'destroy'])->name('projects.destroy');

    // Portfolio routes
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/portfolioEdit', [PortfolioController::class, 'index'])->name('portfolios.index');
        Route::get('/portfolioEdit/manage', [PortfolioController::class, 'manage'])->name('portfolios.manage');
        Route::post('/portfolioEdit', [PortfolioController::class, 'store'])->name('portfolios.store');
        Route::put('/portfolioEdit/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios.update');
        Route::delete('/portfolioEdit/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');
        Route::delete('/portfolioImages/{id}', [PortfolioImageController::class, 'destroy'])->name('portfolioImages.destroy');
    });
    

    



    // Partner routes
    Route::get('/partnersEdit', [PartnerController::class, 'index'])->name('partnersEdit.index');
    Route::post('/partnersEdit', [PartnerController::class, 'store'])->name('partnersEdit.store');
    Route::put('/partnersEdit/{partner}', [PartnerController::class, 'update'])->name('partnersEdit.update');
    Route::delete('/partnersEdit/{partner}', [PartnerController::class, 'destroy'])->name('partnersEdit.destroy');

    // Tag routes
    Route::get('/tagsEdit', [TagController::class, 'index'])->name('tagsEdit.index');
    Route::post('/tagsEdit', [TagController::class, 'store'])->name('tagsEdit.store');
    Route::get('/tagsEdit/{tag}/edit', [TagController::class, 'edit'])->name('tagsEdit.edit');
    Route::put('/tagsEdit/{tag}', [TagController::class, 'update'])->name('tagsEdit.update');
    Route::delete('/tagsEdit/{tag}', [TagController::class, 'destroy'])->name('tagsEdit.destroy');

    Route::get('/editHomepage', [HomepageController::class, 'edit'])->name('homepage.edit');
    Route::put('/updateAboutUs', [HomepageController::class, 'updateAboutUs'])->name('homepage.updateAboutUs');
    Route::put('/updateServices', [HomepageController::class, 'updateServices'])->name('homepage.updateServices');
    Route::delete('/deleteService/{id}', [HomepageController::class, 'destroyService'])->name('homepage.deleteService');
});

// Auth routes (e.g., login, register, password reset)
require __DIR__.'/auth.php';
