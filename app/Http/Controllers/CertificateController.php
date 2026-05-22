<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'issuer'         => 'required|string|max:255',
            'category'       => 'required|in:Programming,Database,Tools,Seminar',
            'date'           => 'required|string|max:100',
            'progress'       => 'required|integer|min:0|max:100',
            'credential_url' => 'nullable|url',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['title', 'issuer', 'category', 'date', 'progress', 'icon_svg', 'credential_url']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('certificates', 'public');
            $data['image'] = $path;
        }

        Certificate::create($data);

        return back()->with('success', 'Certificate added successfully!');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'issuer'         => 'required|string|max:255',
            'category'       => 'required|in:Programming,Database,Tools,Seminar',
            'date'           => 'required|string|max:100',
            'progress'       => 'required|integer|min:0|max:100',
            'credential_url' => 'nullable|url',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['title', 'issuer', 'category', 'date', 'progress', 'icon_svg', 'credential_url']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }
            $path = $request->file('image')->store('certificates', 'public');
            $data['image'] = $path;
        }

        $certificate->update($data);

        return back()->with('success', 'Certificate updated!');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }
        $certificate->delete();
        return back()->with('success', 'Certificate removed.');
    }
}
