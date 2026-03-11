<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('dashboard.contacts', [
            'contacts' => \App\Models\Contact::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create($request->all());

        return back()->with('success', 'Your message has been delivered to the Court of Fontaine!');
    }

    public function update(\App\Models\Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Message marked as read.');
    }

    public function destroy(\App\Models\Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message cleared from archives.');
    }
}
