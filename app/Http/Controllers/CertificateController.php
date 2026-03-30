<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'issuer'   => 'required|string|max:255',
            'category' => 'required|in:Programming,Database,Tools',
            'date'     => 'required|string|max:100',
            'progress' => 'required|integer|min:0|max:100',
            'credential_url' => 'nullable|url',
        ]);

        Certificate::create($request->only([
            'title', 'issuer', 'category', 'date', 'progress', 'icon_svg', 'credential_url'
        ]));

        return back()->with('success', 'Certificate added successfully!');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'issuer'   => 'required|string|max:255',
            'category' => 'required|in:Programming,Database,Tools',
            'date'     => 'required|string|max:100',
            'progress' => 'required|integer|min:0|max:100',
            'credential_url' => 'nullable|url',
        ]);

        $certificate->update($request->only([
            'title', 'issuer', 'category', 'date', 'progress', 'icon_svg', 'credential_url'
        ]));

        return back()->with('success', 'Certificate updated!');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return back()->with('success', 'Certificate removed.');
    }
}
