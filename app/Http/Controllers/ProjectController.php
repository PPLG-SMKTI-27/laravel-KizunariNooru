<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('dashboard', compact('projects'));
    }

    public function portfolio()
    {
        $projects = Project::latest()->get();
        return view('pages.portfolio', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech' => 'nullable|string',
            'github' => 'nullable|url',
            'demo' => 'nullable|url',
        ]);

        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'tech' => $request->tech,
            'github' => $request->github,
            'demo' => $request->demo,
        ]);

        return redirect()->back()->with('success', 'Project created successfully!');
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech' => 'nullable|string',
            'github' => 'nullable|url',
            'demo' => 'nullable|url',
        ]);

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'tech' => $request->tech,
            'github' => $request->github,
            'demo' => $request->demo,
        ]);

        return redirect()->back()->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
