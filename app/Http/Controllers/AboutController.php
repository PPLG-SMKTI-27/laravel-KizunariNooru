<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about', [
            'skills' => [
                'Laravel', 'PHP', 'Tailwind CSS',
                'JavaScript', 'MySQL', 'UI Design'
            ],
            'experiences' => [
                [
                    'year' => '2024 - Now',
                    'title' => 'Web Developer',
                    'desc' => 'Membangun web menggunakan Laravel & Tailwind.'
                ],
                [
                    'year' => '2023',
                    'title' => 'Student / RPL',
                    'desc' => 'Belajar backend & frontend web.'
                ],
            ]
        ]);
    }
}
