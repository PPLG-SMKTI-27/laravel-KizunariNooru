<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Project;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    $projects = Project::latest()->take(6)->get();
    $projectCount = Project::count();
    $skills = \App\Models\Skill::all();
    return view('pages.home', compact('projects', 'projectCount', 'skills'));
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'projects'     => Project::latest()->get(),
            'projectCount' => Project::count(),
            'skills'       => \App\Models\Skill::all(),
            'contacts'     => \App\Models\Contact::latest()->get(),
            'unreadCount'  => \App\Models\Contact::where('is_read', false)->count(),
        ]);
    })->name('dashboard');

    Route::resource('projects', ProjectController::class)->except(['create', 'show', 'edit']);
    Route::resource('skills', SkillController::class)->except(['create', 'show', 'edit']);
    Route::resource('contacts', ContactController::class)->only(['index', 'update', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
