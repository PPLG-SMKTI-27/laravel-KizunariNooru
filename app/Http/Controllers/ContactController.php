<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactMessage;

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
            'budget'  => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Cloudflare Turnstile anti-spam verification
        $secretKey = config('services.turnstile.secret_key');
        if ($secretKey && $secretKey !== 'YOUR_TURNSTILE_SECRET_KEY') {
            $token = $request->input('cf-turnstile-response');
            if (!$token) {
                $err = 'Security verification failed. Please try again.';
                if ($request->wantsJson() || $request->ajax()) {
                    return response()->json(['success' => false, 'message' => $err], 422);
                }
                return back()->withErrors(['captcha' => $err]);
            }

            $cfResponse = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => $secretKey,
                'response' => $token,
                'remoteip' => $request->ip(),
            ]);

            if (!$cfResponse->json('success')) {
                $err = 'Bot detected. Verification failed.';
                if ($request->wantsJson() || $request->ajax()) {
                    return response()->json(['success' => false, 'message' => $err], 422);
                }
                return back()->withErrors(['captcha' => $err]);
            }
        }

        $contact = \App\Models\Contact::create($request->all());

        // Send email notification to admin (fails silently so UX is not broken)
        try {
            $adminEmail = config('mail.from.address', env('MAIL_FROM_ADDRESS'));
            if ($adminEmail && $adminEmail !== 'hello@example.com') {
                Mail::to($adminEmail)->send(new NewContactMessage($request->only(
                    ['name', 'email', 'subject', 'budget', 'message']
                )));
            }
        } catch (\Exception $e) {
            // Mail failed silently — contact is still saved to DB
            Log::warning('Contact mail failed: ' . $e->getMessage());
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been delivered to the Court of Fontaine!'
            ]);
        }

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
