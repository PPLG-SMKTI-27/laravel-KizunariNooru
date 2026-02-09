<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('pages.portfolio',
        compact('projects'));
    }
}
