<?php

namespace App\Http\Controllers;

use App\Models\Grievance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrievanceController extends Controller
{
    /**
     * Council list definition.
     */
    public static function councils(): array
    {
        return [
            'Customs / EDI Council',
            'CBLR 2018 Council',
            'CFS / PORT / EMPTY YARD Council',
            'SHIPPING LINE / STAMP DUTY Council',
            'PPQ / FSSAI / AQS & OTHER PGA COUNCIL',
            'CCFC / PTFC / PGC OR IF ANY ISSUE',
        ];
    }

    /**
     * Display grievances (Councils list or specific council grievance page).
     */
    public function index(Request $request)
    {
        $councils = self::councils();
        $selectedCouncil = $request->query('council');

        $grievances = collect();
        if ($selectedCouncil) {
            $query = Grievance::query();

            // Filter by council
            $query->where('council', $selectedCouncil);

            // Filter by authenticated user unless admin
            if (!Auth::user()->isAdmin()) {
                $query->where('user_id', Auth::id());
            }

            // Filter by subject/answer search if present
            if ($request->filled('search')) {
                $search = $request->query('search');
                $query->where(function ($q) use ($search) {
                    $q->where('subject', 'like', "%{$search}%")
                      ->orWhere('query', 'like', "%{$search}%")
                      ->orWhere('answer', 'like', "%{$search}%");
                });
            }

            // Filter by status if selected
            if ($request->filled('status') && in_array($request->query('status'), ['Pending', 'Answered'])) {
                $query->where('status', $request->query('status'));
            }

            $grievances = $query->latest()->get();
        }

        return view('grievances', [
            'councils' => $councils,
            'selectedCouncil' => $selectedCouncil,
            'grievances' => $grievances,
        ]);
    }

    /**
     * Store a new grievance.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'council' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'query' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['member_name'] = Auth::user()->name;
        $validated['status'] = 'Pending';

        Grievance::create($validated);

        return redirect()->route('grievances.index', ['council' => $request->council])
            ->with('success', 'Grievance submitted successfully!');
    }

    /**
     * Delete a grievance.
     */
    public function destroy(Grievance $grievance)
    {
        if ($grievance->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $council = $grievance->council;
        $grievance->delete();

        return redirect()->route('grievances.index', ['council' => $council])
            ->with('success', 'Grievance removed successfully!');
    }

    /**
     * Admin answer/reply to grievance.
     */
    public function updateAnswer(Request $request, Grievance $grievance)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'answer' => 'required|string',
        ]);

        $grievance->update([
            'answer' => $request->answer,
            'status' => 'Answered',
        ]);

        return redirect()->back()->with('success', 'Answer posted successfully!');
    }
}
