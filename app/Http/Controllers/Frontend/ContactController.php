<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactController extends Controller
{
    public function show()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Store message in database
        try {
            Message::create([
                'name' => $validated['name'],
                'email' => $validated['email'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'] ?? null,
                'message' => $validated['message'],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Exception $e) {
            // If DB save fails, continue so email still attempts to send
        }

        // Send email
        try {
            Mail::raw("Name: {$validated['name']}\nEmail: {$validated['email']}\nPhone: {$validated['phone']}\n\nMessage:\n{$validated['message']}", function($message) use ($validated) {
                $message->to(config('mail.from.address'))
                    ->subject('New Inquiry: ' . $validated['subject']);
            });
        } catch (\Exception $e) {
            // Silently fail for now
        }

        return redirect('/contact')
            ->with('success', 'Thank you! We will contact you soon.');
    }
}
