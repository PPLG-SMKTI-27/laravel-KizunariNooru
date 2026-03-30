<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'label'       => 'required|string|max:255',
            'description' => 'required|string',
            'svg_path'    => 'nullable|string',
        ]);

        $maxOrder = Service::max('sort_order') ?? 0;

        Service::create([
            'title'       => $request->title,
            'label'       => $request->label,
            'description' => $request->description,
            'svg_path'    => $request->svg_path,
            'sort_order'  => $maxOrder + 1,
        ]);

        return back()->with('success', 'Service added!');
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'label'       => 'required|string|max:255',
            'description' => 'required|string',
            'svg_path'    => 'nullable|string',
        ]);

        $service->update($request->only(['title', 'label', 'description', 'svg_path']));

        return back()->with('success', 'Service updated!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service removed.');
    }
}
