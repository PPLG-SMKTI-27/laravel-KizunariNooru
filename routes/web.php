<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'home']);          // Landing page + About + Contact
Route::get('/portfolio', [PortfolioController::class, 'index']); // All projects
Route::get('/portfolio/{id}', [PortfolioController::class, 'show']); // Detail project

