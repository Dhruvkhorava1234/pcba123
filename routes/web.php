<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Pipavav Customs Brokers Association (PCBA)
|--------------------------------------------------------------------------
*/

// Public Association Pages
Route::get('/', function () {
    return view('pcba-home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/compliance', function () {
    return view('compliance');
})->name('compliance');

Route::get('/training', function () {
    return view('training');
})->name('training');

Route::get('/trade-facilitation', function () {
    return view('trade-facilitation');
})->name('trade-facilitation');

Route::get('/membership', function () {
    return view('membership');
})->name('membership');

Route::get('/membership/apply', [\App\Http\Controllers\MembershipApplicationController::class, 'showForm'])->name('membership.apply');
Route::post('/membership/apply', [\App\Http\Controllers\MembershipApplicationController::class, 'store'])->name('membership.apply.store');
Route::post('/membership/payment/callback', [\App\Http\Controllers\MembershipApplicationController::class, 'paymentCallback'])->name('membership.payment.callback');

Route::get('/membership/search', [\App\Http\Controllers\MembershipDirectoryController::class, 'index'])->name('membership.search');
Route::get('/membership/search/query', [\App\Http\Controllers\MembershipDirectoryController::class, 'search'])->name('membership.search.query');

Route::get('/associations', function () {
    return view('associations');
})->name('associations');

Route::get('/gallery', function () {
    $folders = \App\Models\GalleryFolder::with(['images' => function ($q) {
        $q->latest();
    }])->withCount('images')->latest()->get();
    
    $galleryImages = \App\Models\GalleryImage::with('folder')->latest()->get();
    return view('gallery', compact('folders', 'galleryImages'));
})->name('gallery');

Route::get('/events', function () {
    $events = \App\Models\Event::latest()->get();
    return view('events', compact('events'));
})->name('events');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authenticated Member Area
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    // Member does not open dashboard; redirects straight to CFS Passes
    return redirect()->route('cfs-passes');
})->middleware(['auth'])->name('dashboard');

Route::get('/cfs-passes', [\App\Http\Controllers\CfsPassController::class, 'index'])->middleware(['auth'])->name('cfs-passes');
Route::post('/cfs-passes', [\App\Http\Controllers\CfsPassController::class, 'store'])->middleware(['auth'])->name('cfs-passes.store');

// Contact Manager Routes (Member & Admin)
Route::middleware('auth')->group(function () {
    Route::get('/contact-manager', [\App\Http\Controllers\ContactManagerController::class, 'index'])->name('contacts.index');
    Route::post('/contact-manager', [\App\Http\Controllers\ContactManagerController::class, 'store'])->name('contacts.store');
    Route::delete('/contact-manager/{contact}', [\App\Http\Controllers\ContactManagerController::class, 'destroy'])->name('contacts.destroy');

    // Dedicated Change Password Page
    Route::get('/change-password', [\App\Http\Controllers\ChangePasswordController::class, 'show'])->name('password.change');
    Route::put('/change-password', [\App\Http\Controllers\ChangePasswordController::class, 'update'])->name('password.change.update');

    // My Grievances Routes
    Route::get('/grievances', [\App\Http\Controllers\GrievanceController::class, 'index'])->name('grievances.index');
    Route::post('/grievances', [\App\Http\Controllers\GrievanceController::class, 'store'])->name('grievances.store');
    Route::patch('/grievances/{grievance}/answer', [\App\Http\Controllers\GrievanceController::class, 'updateAnswer'])->name('grievances.answer');
    Route::delete('/grievances/{grievance}', [\App\Http\Controllers\GrievanceController::class, 'destroy'])->name('grievances.destroy');

    // Receipt and Invoice Routes
    Route::get('/receipt-and-invoice', [\App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/receipts/{invoice}/download', [\App\Http\Controllers\InvoiceController::class, 'downloadReceipt'])->name('invoices.receipt');
    Route::get('/invoices/{invoice}/download', [\App\Http\Controllers\InvoiceController::class, 'downloadInvoice'])->name('invoices.invoice');
});

// Admin Routes (Only accessible by role = 'admin')
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/events', [\App\Http\Controllers\AdminDashboardController::class, 'storeEvent'])->name('events.store');
    Route::patch('/events/{event}/status', [\App\Http\Controllers\AdminDashboardController::class, 'toggleEventStatus'])->name('events.status');
    Route::delete('/events/{event}', [\App\Http\Controllers\AdminDashboardController::class, 'destroyEvent'])->name('events.destroy');
    Route::post('/gallery', [\App\Http\Controllers\AdminDashboardController::class, 'storeGallery'])->name('gallery.store');
    Route::delete('/gallery/{galleryImage}', [\App\Http\Controllers\AdminDashboardController::class, 'destroyGallery'])->name('gallery.destroy');
    Route::post('/gallery/folders', [\App\Http\Controllers\AdminDashboardController::class, 'storeFolder'])->name('gallery.folders.store');
    Route::delete('/gallery/folders/{folder}', [\App\Http\Controllers\AdminDashboardController::class, 'destroyFolder'])->name('gallery.folders.destroy');
    Route::delete('/members/{member}', [\App\Http\Controllers\AdminDashboardController::class, 'destroyMember'])->name('members.destroy');
    Route::patch('/passes/{pass}/status', [\App\Http\Controllers\AdminDashboardController::class, 'updatePassStatus'])->name('passes.status');
    // Circulars
    Route::post('/circulars', [\App\Http\Controllers\AdminDashboardController::class, 'storeCircular'])->name('circulars.store');
    Route::patch('/circulars/{circular}/toggle', [\App\Http\Controllers\AdminDashboardController::class, 'toggleCircular'])->name('circulars.toggle');
    Route::delete('/circulars/{circular}', [\App\Http\Controllers\AdminDashboardController::class, 'destroyCircular'])->name('circulars.destroy');
    // Membership Applications
    Route::delete('/applications/{application}', [\App\Http\Controllers\AdminDashboardController::class, 'destroyApplication'])->name('applications.destroy');
    Route::patch('/events/{event}', [\App\Http\Controllers\AdminDashboardController::class, 'updateEvent'])->name('events.update');
});

// Public Circulars Page
Route::get('/circulars', function () {
    $circulars = \App\Models\Circular::active()->latest('published_at')->get();
    return view('circulars', compact('circulars'));
})->name('circulars');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel Breeze Authentication Routes (login, register, forgot-password, etc.)
require __DIR__.'/auth.php';
