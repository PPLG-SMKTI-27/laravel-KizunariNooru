<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('dashboard', [
            'projects'     => Project::latest()->get(),
            'projectCount' => Project::count(),
            'skills'       => Skill::all(),
            'contacts'     => Contact::latest()->get(),
            'unreadCount'  => Contact::where('is_read', false)->count(),
        ]);
    }
}
