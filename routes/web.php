<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;

Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'id', 'ja'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back()->setTargetUrl(
        url()->previous() !== url()->current() ? url()->previous() : '/'
    );
})->name('locale.switch');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectController::class, 'portfolio'])->name('public.projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('public.projects.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:6,1');

// SEO: Sitemap & Robots
Route::get('/sitemap.xml', [\App\Http\Controllers\SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [\App\Http\Controllers\SeoController::class, 'robots'])->name('robots');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('projects', ProjectController::class)->except(['create', 'show', 'edit']);
        Route::resource('skills', SkillController::class)->except(['create', 'show', 'edit']);
        Route::resource('contacts', ContactController::class)->only(['index', 'update', 'destroy']);
        Route::resource('certificates', CertificateController::class)->only(['store', 'update', 'destroy']);
        Route::resource('services', ServiceController::class)->only(['store', 'update', 'destroy']);
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
