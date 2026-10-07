<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactManagerController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('contact-manager', compact('contacts'));
    }

    /**
     * Store a newly created contact.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile_no' => 'required|string|max:30',
            'alt_mobile_no' => 'nullable|string|max:30',
            'landline_no' => 'nullable|string|max:30',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }

    /**
     * Delete the specified contact.
     */
    public function destroy(Contact $contact)
    {
        // Check ownership or admin
        if ($contact->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $contact->delete(); 

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
