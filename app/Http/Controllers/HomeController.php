<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(3)->get();
        $projectCount = Project::count();
        $skills = Skill::all();

        return view('pages.home', compact(
            'projects',
            'projectCount',
            'skills'
        ));
    }
}
