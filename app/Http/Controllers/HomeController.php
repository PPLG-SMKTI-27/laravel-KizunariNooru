<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $projects     = Project::latest()->take(3)->get();
        $projectCount = Project::count();
        $skills       = Skill::all();
        $certificates = Certificate::orderBy('sort_order')->get();
        $services     = Service::orderBy('sort_order')->get();
        $settings     = Setting::allAsArray();

        return view('pages.home.home', compact(
            'projects', 'projectCount', 'skills', 'certificates', 'services', 'settings'
        ));
    }
}
