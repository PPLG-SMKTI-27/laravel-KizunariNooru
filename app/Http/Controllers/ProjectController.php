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

    public function portfolio(Request $request)
    {
        $query = Project::latest();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('tech', 'like', "%{$search}%");
            });
        }

        if ($request->has('category') && $request->category != 'All') {
            $query->where('category', $request->category);
        }

        $projects = $query->get();
        return view('pages.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('pages.projects.show', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'result' => 'nullable|string',
            'features' => 'nullable|string',
            'tech' => 'nullable|string',
            'github' => 'nullable|url',
            'demo' => 'nullable|url',
            'image' => 'nullable|image|max:20480',
            'image_desktop' => 'nullable|image|max:20480',
            'image_tablet' => 'nullable|image|max:20480',
            'image_mobile' => 'nullable|image|max:20480',
        ]);

        $uploadImage = function($file) {
            return $file ? $file->store('projects', 'public') : null;
        };

        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'description' => $request->description,
            'challenge' => $request->challenge,
            'solution' => $request->solution,
            'result' => $request->result,
            'features' => $request->features,
            'tech' => $request->tech,
            'github' => $request->github,
            'demo' => $request->demo,
            'image' => $uploadImage($request->file('image')),
            'image_desktop' => $uploadImage($request->file('image_desktop')),
            'image_tablet' => $uploadImage($request->file('image_tablet')),
            'image_mobile' => $uploadImage($request->file('image_mobile')),
        ]);

        return redirect()->back()->with('success', 'Project created successfully!');
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'result' => 'nullable|string',
            'features' => 'nullable|string',
            'tech' => 'nullable|string',
            'github' => 'nullable|url',
            'demo' => 'nullable|url',
            'image' => 'nullable|image|max:20480',
            'image_desktop' => 'nullable|image|max:20480',
            'image_tablet' => 'nullable|image|max:20480',
            'image_mobile' => 'nullable|image|max:20480',
        ]);

        $uploadImage = function($file, $oldPath) {
            if ($file) {
                if ($oldPath && \Illuminate\Support\Facades\Storage::disk('public')->exists($oldPath)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
                }
                return $file->store('projects', 'public');
            }
            return $oldPath;
        };

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'description' => $request->description,
            'challenge' => $request->challenge,
            'solution' => $request->solution,
            'result' => $request->result,
            'features' => $request->features,
            'tech' => $request->tech,
            'github' => $request->github,
            'demo' => $request->demo,
            'image' => $uploadImage($request->file('image'), $project->image),
            'image_desktop' => $uploadImage($request->file('image_desktop'), $project->image_desktop),
            'image_tablet' => $uploadImage($request->file('image_tablet'), $project->image_tablet),
            'image_mobile' => $uploadImage($request->file('image_mobile'), $project->image_mobile),
        ]);

        return redirect()->back()->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
