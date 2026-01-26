<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show portfolio homepage (PUBLIC - no login required)
     */
    public function index()
    {
        return view('pages.home');
    }
}