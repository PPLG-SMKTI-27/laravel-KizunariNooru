<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Certificate;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'projects'      => Project::latest()->get(),
            'projectCount'  => Project::count(),
            'skills'        => Skill::all(),
            'contacts'      => Contact::latest()->get(),
            'unreadCount'   => Contact::where('is_read', false)->count(),
            'certificates'  => Certificate::orderBy('sort_order')->get(),
            'services'      => Service::orderBy('sort_order')->get(),
            'settings'      => Setting::allAsArray(),
        ]);
    }
}
