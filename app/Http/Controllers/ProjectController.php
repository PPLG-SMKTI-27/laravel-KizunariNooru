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
            'title' => 'required|array',
            'title.id' => 'required|string|max:255',
            'category' => 'nullable|array',
            'description' => 'required|array',
            'description.id' => 'required|string',
            'challenge' => 'nullable|array',
            'solution' => 'nullable|array',
            'result' => 'nullable|array',
            'features' => 'nullable|array',
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

        $translatableData = $this->autoTranslateFields($request->only([
            'title', 'category', 'description', 'challenge', 'solution', 'result', 'features'
        ]));

        $slugBase = $translatableData['title']['en'] ?? $translatableData['title']['id'] ?? 'project';

        Project::create([
            'title' => $translatableData['title'],
            'slug' => $this->generateUniqueSlug($slugBase),
            'category' => $translatableData['category'] ?? null,
            'description' => $translatableData['description'],
            'challenge' => $translatableData['challenge'] ?? null,
            'solution' => $translatableData['solution'] ?? null,
            'result' => $translatableData['result'] ?? null,
            'features' => $translatableData['features'] ?? null,
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
            'title' => 'required|array',
            'title.id' => 'required|string|max:255',
            'category' => 'nullable|array',
            'description' => 'required|array',
            'description.id' => 'required|string',
            'challenge' => 'nullable|array',
            'solution' => 'nullable|array',
            'result' => 'nullable|array',
            'features' => 'nullable|array',
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

        $translatableData = $this->autoTranslateFields($request->only([
            'title', 'category', 'description', 'challenge', 'solution', 'result', 'features'
        ]));

        $slugBase = $translatableData['title']['en'] ?? $translatableData['title']['id'] ?? 'project';

        $project->update([
            'title' => $translatableData['title'],
            'slug' => $this->generateUniqueSlug($slugBase, $project->id),
            'category' => $translatableData['category'] ?? null,
            'description' => $translatableData['description'],
            'challenge' => $translatableData['challenge'] ?? null,
            'solution' => $translatableData['solution'] ?? null,
            'result' => $translatableData['result'] ?? null,
            'features' => $translatableData['features'] ?? null,
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

    /**
     * Generate a unique slug for the project.
     */
    private function generateUniqueSlug(string $title, int|string|null $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Project::where('slug', $slug)->when($id, fn($q) => $q->where('id', '!=', $id))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    /**
     * Automatically translate missing fields using Google Translate API.
     */
    private function autoTranslateFields(array $data)
    {
        $fields = ['title', 'category', 'description', 'challenge', 'solution', 'result', 'features'];
        
        foreach ($fields as $field) {
            if (isset($data[$field]) && is_array($data[$field])) {
                $idText = $data[$field]['id'] ?? null;
                
                if (!empty($idText)) {
                    // English
                    if (empty($data[$field]['en'])) {
                        try {
                            $data[$field]['en'] = \Stichoza\GoogleTranslate\GoogleTranslate::trans($idText, 'en', 'id');
                        } catch (\Exception $e) {
                            $data[$field]['en'] = $idText;
                        }
                    }
                    
                    // Japanese
                    if (empty($data[$field]['ja'])) {
                        try {
                            $data[$field]['ja'] = \Stichoza\GoogleTranslate\GoogleTranslate::trans($idText, 'ja', 'id');
                        } catch (\Exception $e) {
                            $data[$field]['ja'] = $idText;
                        }
                    }
                }
            }
        }
        
        return $data;
    }
}
