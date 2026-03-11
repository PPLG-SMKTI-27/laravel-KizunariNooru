<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return view('dashboard.skills', [
            'skills' => \App\Models\Skill::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category'   => 'nullable|string|max:255',
        ]);

        \App\Models\Skill::create($request->all());

        return back()->with('success', 'New talent mastered!');
    }

    public function update(Request $request, \App\Models\Skill $skill)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category'   => 'nullable|string|max:255',
        ]);

        $skill->update($request->all());

        return back()->with('success', 'Skill refined!');
    }

    public function destroy(\App\Models\Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill removed from repertoire.');
    }
}
