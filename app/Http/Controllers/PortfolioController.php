<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('pages.portfolio', [
            'projects' => config('portfolio.all')
        ]);
    }

    public function show(string $slug)
    {
        $projects = collect(config('portfolio.all'));
        $project = $projects->firstWhere('slug', $slug);

        abort_if(!$project, 404);

        return view('pages.project', compact('project'));
    }
}

