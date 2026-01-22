<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    PortfolioController,
    AboutController,
    ContactController
};

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show']);
Route::get('/contact', [ContactController::class, 'index']);
