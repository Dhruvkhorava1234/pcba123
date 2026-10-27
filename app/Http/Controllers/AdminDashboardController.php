<?php

namespace App\Http\Controllers;

use App\Models\CfsPass;
use App\Models\Circular;
use App\Models\Event;
use App\Models\GalleryFolder;
use App\Models\GalleryImage;
use App\Models\MembershipApplication;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $membersCount       = User::where('role', 'member')->count();
        $eventsCount        = Event::count();
        $galleryCount       = GalleryImage::count();
        $foldersCount       = GalleryFolder::count();
        $passesCount        = CfsPass::count();
        $circularsCount     = Circular::count();
        $applicationsCount  = MembershipApplication::count();

        $members                = User::where('role', 'member')->orderBy('name', 'asc')->get();
        $events                 = Event::latest()->get();
        $galleryFolders         = GalleryFolder::withCount('images')->latest()->get();
        $galleryImages          = GalleryImage::with('folder')->latest()->get();
        $passes                 = CfsPass::with('user')->latest()->get();
        $circulars              = Circular::withTrashed()->latest()->get();
        $membershipApplications = MembershipApplication::orderBy('company_name', 'asc')->get();
        $appsByEmail            = $membershipApplications->keyBy(function ($app) {
            return strtolower(trim($app->email));
        });

        return view('admin.dashboard', compact(
            'membersCount',
            'eventsCount',
            'galleryCount',
            'foldersCount',
            'passesCount',
            'circularsCount',
            'applicationsCount',
            'members',
            'events',
            'galleryFolders',
            'galleryImages',
            'passes',
            'circulars',
            'membershipApplications',
            'appsByEmail'
        ));
    }

    /**
     * Store a newly created event.
     */
    public function storeEvent(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title'      => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'location'   => 'nullable|string|max:255',
            'status'     => 'required|string|in:upcoming,completed',
            'description'=> 'nullable|string',
            'image'      => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,bmp,avif,ico,heic,heif,tiff,tif|max:25600',
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
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/events'), $filename);
            $validated['image'] = 'uploads/events/' . $filename;
        }

        Event::create($validated);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Event added successfully!',
            'active_tab' => 'events',
        ]);
    }

    /**
     * Update an event.
     */
    public function updateEvent(Request $request, Event $event)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title'      => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'location'   => 'nullable|string|max:255',
            'status'     => 'required|string|in:upcoming,completed',
            'description'=> 'nullable|string',
            'image'      => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,bmp,avif,ico,heic,heif,tiff,tif|max:25600',
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
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/events'), $filename);
            $validated['image'] = 'uploads/events/' . $filename;
        }

        $event->update($validated);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Event updated successfully!',
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
            'success'    => 'Event "' . $event->title . '" status updated to ' . strtoupper($event->status) . '!',
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
            'success'    => 'Event deleted successfully!',
            'active_tab' => 'events',
        ]);
    }

    /**
     * Store a newly created gallery folder.
     */
    public function storeFolder(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name'        => 'required|string|max:150',
            'description' => 'nullable|string|max:500',
            'cover_image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,bmp,avif,ico,heic,heif,tiff,tif|max:25600',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'gallery')
                ->with('error', 'Folder creation failed: ' . $validator->errors()->first());
        }

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/gallery/covers'), $filename);
            $coverPath = 'uploads/gallery/covers/' . $filename;
        }

        $folder = GalleryFolder::create([
            'name'        => $request->name,
            'description' => $request->description,
            'cover_image' => $coverPath,
        ]);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Gallery folder "' . $folder->name . '" created successfully!',
            'active_tab' => 'gallery',
        ]);
    }

    /**
     * Delete a gallery folder.
     */
    public function destroyFolder(GalleryFolder $folder)
    {
        $folderName = $folder->name;
        $folder->images()->update(['folder_id' => null]);
        $folder->forceDelete();

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Folder "' . $folderName . '" deleted successfully!',
            'active_tab' => 'gallery',
        ]);
    }

    /**
     * Store newly uploaded gallery image(s).
     */
    public function storeGallery(Request $request)
    {
        $images = $request->file('images');
        if (!$images && $request->hasFile('image')) {
            $images = [$request->file('image')];
        }

        if (empty($images) || !is_array($images)) {
            return redirect()->back()
                ->withInput()
                ->with('active_tab', 'gallery')
                ->with('error', 'Please choose at least one image file to upload.');
        }

        $folder = null;
        if ($request->filled('folder_id')) {
            $folder = GalleryFolder::find($request->folder_id);
        }

        $folderName       = $folder ? $folder->name : 'PCBA Gallery';
        $uploadedCount    = 0;
        $allowedExtensions = ['jpeg', 'jpg', 'png', 'gif', 'webp', 'svg', 'bmp', 'avif', 'ico', 'heic', 'heif', 'tiff', 'tif'];

        foreach ($images as $file) {
            if (!$file || !$file->isValid()) {
                continue;
            }

            $ext = strtolower($file->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                continue;
            }

            $origName   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $cleanTitle = ucwords(str_replace(['-', '_'], ' ', $origName));
            if (empty(trim($cleanTitle))) {
                $cleanTitle = $folder ? $folder->name : 'Gallery Photo';
            }

            $filename = time() . '_' . uniqid() . '.' . $ext;
            $file->move(public_path('uploads/gallery'), $filename);

            GalleryImage::create([
                'folder_id'  => $request->folder_id ?: null,
                'title'      => $cleanTitle,
                'category'   => $folderName,
                'image_path' => 'uploads/gallery/' . $filename,
            ]);

            $uploadedCount++;
        }

        if ($uploadedCount === 0) {
            return redirect()->back()
                ->withInput()
                ->with('active_tab', 'gallery')
                ->with('error', 'No valid images could be uploaded. Please ensure the files are valid images.');
        }

        $msg = $uploadedCount === 1
            ? '1 photo uploaded successfully!'
            : $uploadedCount . ' photos uploaded successfully to ' . ($folder ? '"' . $folder->name . '"' : 'gallery') . '!';

        return redirect()->route('admin.dashboard')->with([
            'success'    => $msg,
            'active_tab' => 'gallery',
        ]);
    }

    /**
     * Delete a gallery image.
     */
    public function destroyGallery(GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Gallery image deleted successfully!',
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
                'error'      => 'Cannot delete an administrator.',
                'active_tab' => 'members',
            ]);
        }

        $member->delete();
        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Member deleted successfully!',
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
            'success'    => 'CFS Pass status updated to ' . $request->pass_status,
            'active_tab' => 'passes',
        ]);
    }

    /* ── CIRCULARS ──────────────────────────────────────────────────────── */

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

        $validated['user_id']      = auth()->id();
        $validated['is_active']    = true;
        $validated['published_at'] = $validated['published_at'] ?? now()->toDateString();

        Circular::create($validated);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Circular published successfully!',
            'active_tab' => 'circulars',
        ]);
    }

    public function toggleCircular(Circular $circular)
    {
        $circular->update(['is_active' => !$circular->is_active]);

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Circular status updated.',
            'active_tab' => 'circulars',
        ]);
    }

    public function destroyCircular(Circular $circular)
    {
        $circular->delete();

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Circular removed.',
            'active_tab' => 'circulars',
        ]);
    }

    /**
     * Delete a membership application.
     */
    public function destroyApplication(MembershipApplication $application)
    {
        $application->delete();

        return redirect()->route('admin.dashboard')->with([
            'success'    => 'Application deleted successfully!',
            'active_tab' => 'applications',
        ]);
    }
}
