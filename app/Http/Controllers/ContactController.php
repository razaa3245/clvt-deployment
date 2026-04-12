<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        return view('web.content.contact');
    }

    public function submit(Request $request)
    {
        //Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        //Save to database
        Contact::create($validated);

        //Redirect back with success message
        return back()->with('success', 'Your message has been sent and stored successfully!');
    }
}
