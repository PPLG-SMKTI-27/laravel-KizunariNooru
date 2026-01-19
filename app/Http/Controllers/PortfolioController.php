<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // HALAMAN HOME (LANDING PAGE)
    public function home()
    {
        // Bisa kirim dummy projects juga untuk section "Featured" misal
        $projects = [
            ['id' => 1, 'title' => 'Hydro Dashboard'],
            ['id' => 2, 'title' => 'Fontaine Landing Page'],
            ['id' => 3, 'title' => 'Elegant Portfolio'],
        ];

        return view('pages.home', compact('projects'));
    }

    public function index()
    {
        $projects = [
            ['id'=>1,'title'=>'Hydro Dashboard','description'=>'Dashboard admin elegan dengan Laravel dan Tailwind.'],
            ['id'=>2,'title'=>'Fontaine Landing Page','description'=>'Landing page premium dengan desain sinematik.'],
            ['id'=>3,'title'=>'Elegant Portfolio','description'=>'Portfolio profesional bertema Furina.'],
            ['id'=>4,'title'=>'Admin Management','description'=>'Sistem manajemen admin full Laravel.'],
        ];

        return view('pages.portfolio', compact('projects'));
    }

    public function show($id)
    {
        $project = [
            'id' => $id,
            'title' => "Project {$id}",
            'description' => 'Ini adalah halaman detail project dummy.',
            'tech' => ['Laravel', 'Tailwind CSS', 'UI/UX Design'],
        ];

        return view('pages.portfolio-detail', compact('project'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
