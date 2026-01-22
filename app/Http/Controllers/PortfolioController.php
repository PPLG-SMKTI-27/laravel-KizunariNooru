<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    private array $projects = [
        [
            'slug' => 'project-one',
            'title' => 'Project One',
            'description' => 'Deskripsi project satu',
            'image' => '/images/projects/project1.png',
            'tech' => ['Laravel', 'Tailwind', 'MySQL']
        ],
    ];

    public function index()
    {
        return view('pages.portfolio', [
            'projects' => $this->projects
        ]);
    }

    public function show(string $slug)
    {
        $project = collect($this->projects)
            ->firstWhere('slug', $slug);

        abort_if(!$project, 404);

        return view('pages.project', compact('project'));
    }

        
}
