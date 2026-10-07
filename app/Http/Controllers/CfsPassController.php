<?php

namespace App\Http\Controllers;

use App\Models\CfsPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CfsPassController extends Controller
{
    /**
     * Show list of CFS passes for the authenticated member.
     */
    public function index()
    {
        $passes = CfsPass::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('cfs-passes', compact('passes'));
    }

    /**
     * Store a new CFS pass application.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:100',
            'middle_name'     => 'nullable|string|max:100',
            'last_name'       => 'nullable|string|max:100',
            'gender'          => 'required|in:Male,Female,Other',
            'dob'             => 'required|date',
            'blood_group'     => 'nullable|string|max:5',
            'landline_no'     => 'nullable|string|max:20',
            'mobile_no'       => 'required|string|max:15',
            'identity_proof'  => 'nullable|string|max:50',
            'aadhar_number'   => 'required|string|max:20',
            'aadhar_file'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'photo_file'      => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'application_type'=> 'required|in:New,Renewal,Replacement',
            'designation'     => 'nullable|string|max:100',
            'flat_wing'       => 'nullable|string|max:100',
            'building_name'   => 'nullable|string|max:100',
            'road_name'       => 'nullable|string|max:100',
            'area_locality'   => 'nullable|string|max:100',
            'city'            => 'nullable|string|max:50',
            'pincode'         => 'nullable|string|max:10',
        ]);

        // Store uploaded files
        if ($request->hasFile('aadhar_file')) {
            $validated['aadhar_file'] = $request->file('aadhar_file')->store('cfs_passes/aadhar', 'public');
        }
        if ($request->hasFile('photo_file')) {
            $validated['photo_file'] = $request->file('photo_file')->store('cfs_passes/photos', 'public');
        }

        // Generate unique application number
        do {
            $appNo = (string) random_int(100000, 999999);
        } while (CfsPass::where('application_no', $appNo)->exists());

        $validated['application_no'] = $appNo;
        $validated['user_id']        = Auth::id();
        $validated['pass_status']    = 'Pending';

        CfsPass::create($validated);

        return redirect()->route('cfs-passes')
            ->with('success', "CFS Pass application submitted! Application No: {$appNo}");
    }
}
