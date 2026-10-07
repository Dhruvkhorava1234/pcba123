<?php

namespace App\Http\Controllers;

use App\Models\CfsPass;
use App\Models\Circular;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $membersCount  = User::where('role', 'member')->count();
        $eventsCount   = Event::count();
        $galleryCount  = GalleryImage::count();
        $passesCount   = CfsPass::count();
        $circularsCount = Circular::count();

        $members       = User::where('role', 'member')->latest()->get();
        $events        = Event::latest()->get();
        $galleryImages = GalleryImage::latest()->get();
        $passes        = CfsPass::with('user')->latest()->get();
        $circulars     = Circular::withTrashed()->latest()->get();

        return view('admin.dashboard', compact(
            'membersCount',
            'eventsCount',
            'galleryCount',
            'passesCount',
            'circularsCount',
            'members',
            'events',
            'galleryImages',
            'passes',
            'circulars'
        ));
    }

    /**
     * Store a newly created event.
     */
    public function storeEvent(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|string|in:upcoming,completed',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,bmp,avif,ico,heic,heif,tiff,tif|max:25600',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'events')
                ->with('error', 'Failed to add event: ' . $validator->errors()->first());
        }

        $validated = $validator->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $validated['image'] = $path;
        }

        Event::create($validated);

        return redirect()->route('admin.dashboard')->with([
            'success' => 'Event added successfully!',
            'active_tab' => 'events',
        ]);
    }

    /**
     * Update an event.
     */
    public function updateEvent(Request $request, Event $event)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|string|in:upcoming,completed',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,bmp,avif,ico,heic,heif,tiff,tif|max:25600',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'events')
                ->with('error', 'Failed to update event: ' . $validator->errors()->first());
        }

        $validated = $validator->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $validated['image'] = $path;
        }

        $event->update($validated);

        return redirect()->route('admin.dashboard')->with([
            'success' => 'Event updated successfully!',
            'active_tab' => 'events',
        ]);
    }

    /**
     * Quick Toggle or Update status of an event.
     */
    public function toggleEventStatus(Request $request, Event $event)
    {
        if ($request->has('status')) {
            $event->update(['status' => $request->status]);
        } else {
            $newStatus = $event->status === 'upcoming' ? 'completed' : 'upcoming';
            $event->update(['status' => $newStatus]);
        }

        return redirect()->route('admin.dashboard')->with([
            'success' => 'Event "' . $event->title . '" status updated to ' . strtoupper($event->status) . '!',
            'active_tab' => 'events',
        ]);
    }

    /**
     * Delete an event.
     */
    public function destroyEvent(Event $event)
    {
        $event->delete(); 
        return redirect()->route('admin.dashboard')->with([
            'success' => 'Event deleted successfully!',
            'active_tab' => 'events',
        ]);
    }

    /**
     * Store a newly uploaded gallery image.
     */
    public function storeGallery(Request $request)
    {
        // Check if PHP discarded the upload due to upload_max_filesize or post_max_size
        $file = $request->file('image');
        if ($file && !$file->isValid()) {
            return redirect()->back()
                ->withInput()
                ->with('active_tab', 'gallery')
                ->with('error', 'The image file could not be processed by the server (' . $file->getErrorMessage() . '). Please restart WAMP or select an image under 2MB until WAMP is restarted.');
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'category' => 'required|string',
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,webp,svg,bmp,avif,ico,heic,heif,tiff,tif|max:25600',
        ], [
            'image.uploaded' => 'The image could not be uploaded because its file size exceeds WAMP\'s current limit. Please restart WAMP services from the tray icon to activate 64MB uploads.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'gallery')
                ->with('error', 'Image upload failed: ' . $validator->errors()->first());
        }

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'title' => $request->title ?: 'Gallery Photo',
            'category' => $request->category,
            'image_path' => 'storage/' . $path,
        ]);

        return redirect()->route('admin.dashboard')->with([
            'success' => 'Image uploaded to gallery successfully!',
            'active_tab' => 'gallery',
        ]);
    }

    /**
     * Delete a gallery image.
     */
    public function destroyGallery(GalleryImage $galleryImage)
    {
        $galleryImage->delete(); //  delete
        return redirect()->route('admin.dashboard')->with([
            'success' => 'Gallery image deleted successfully!',
            'active_tab' => 'gallery',
        ]);
    }

    /**
     * Delete a member.
     */
    public function destroyMember(User $member)
    {
        if ($member->role === 'admin') {
            return redirect()->route('admin.dashboard')->with([
                'error' => 'Cannot delete an administrator.',
                'active_tab' => 'members',
            ]);
        }

        $member->delete(); //  delete
        return redirect()->route('admin.dashboard')->with([
            'success' => 'Member deleted successfully!',
            'active_tab' => 'members',
        ]);
    }

    /**
     * Update pass status.
     */
    public function updatePassStatus(Request $request, CfsPass $pass)
    {
        $request->validate([
            'pass_status' => 'required|string|in:Approve,Pending,Rejected',
        ]);

        $pass->update(['pass_status' => $request->pass_status]);

        return redirect()->route('admin.dashboard')->with([
            'success' => 'CFS Pass status updated to ' . $request->pass_status,
            'active_tab' => 'passes',
        ]);
    }

    /* ── CIRCULARS ──────────────────────────────────────────────────────── */

    /**
     * Store a new circular / bulletin.
     */
    public function storeCircular(Request $request)
    {
        $validated = $request->validate([
            'badge_label'  => 'required|string|max:30',
            'title'        => 'required|string|max:255',
            'body'         => 'required|string',
            'link_label'   => 'nullable|string|max:100',
            'link_url'     => 'nullable|string|max:500',
            'published_at' => 'nullable|date',
        ]);

        $validated['user_id']   = auth()->id();
        $validated['is_active'] = true;
        $validated['published_at'] = $validated['published_at'] ?? now()->toDateString();

        Circular::create($validated);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Circular published successfully!',
            'active_tab' => 'circulars',
        ]);
    }

    /**
     * Toggle the active/inactive status of a circular.
     */
    public function toggleCircular(Circular $circular)
    {
        $circular->update(['is_active' => !$circular->is_active]);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Circular status updated.',
            'active_tab' => 'circulars',
        ]);
    }

    /**
     * Delete a circular.
     */
    public function destroyCircular(Circular $circular)
    {
        $circular->delete();

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Circular removed.',
            'active_tab' => 'circulars',
        ]);
    }
}
