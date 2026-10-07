@extends('layouts.app')

@section('title', 'Admin Dashboard | Pipavav Customs Brokers Association (PCBA)')

@section('content')
<style>
    /* Instant tab switching without lag */
    .admin-container .tab-pane.fade {
        opacity: 1 !important;
        transition: none !important;
    }

    /* Completely disable mouse hover movement, transforms and tilt on cards */
    .admin-container .card,
    .admin-container .card:hover {
        transform: none !important;
        transition: none !important;
    }
    .admin-container a,
    .admin-container button {
        transition: none !important;
    }
    
    /* Distinct stylish Delete Confirmation Modal Animation (Shake & Glow) */
    @keyframes deleteModalPop {
        0% { transform: scale(0.85); opacity: 0; }
        60% { transform: scale(1.03); opacity: 1; }
        80% { transform: scale(0.98); }
        100% { transform: scale(1); opacity: 1; }
    }
    @keyframes pulseRedRing {
        0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.4); }
        70% { box-shadow: 0 0 0 14px rgba(220, 53, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
    }
    .modal.custom-delete-modal.show .modal-dialog {
        animation: deleteModalPop 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards !important;
    }
    .delete-danger-icon {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background-color: #fee2e2;
        color: #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1rem;
        animation: pulseRedRing 2s infinite;
    }
</style>
<div class="bg-light min-vh-100 admin-container" style="padding-top: 125px; padding-bottom: 70px;">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        
        <!-- Header -->
        <div class="d-flex flex-column flex-md-row md:items-center justify-content-between gap-3 mb-4 pb-3 border-bottom bg-white p-4 rounded-3 shadow-sm">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-danger text-uppercase px-2.5 py-1 fs-8 fw-bold">Admin Portal</span>
                    <span class="text-muted small">• Pipavav Customs Brokers Association</span>
                </div>
                <h2 class="h3 fw-bold text-dark mb-0">Control & Management Dashboard</h2>
                <p class="text-muted small mb-0">Manage Association Members, Events & Conclaves, Gallery Media, and CFS Port Passes.</p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-dark px-3 py-2 text-white">
                    <i class="bi bi-shield-lock-fill text-warning me-1"></i> Logged in as: {{ Auth::user()->name }}
                </span>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-dark">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Public Site
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Please check the following issues:</div>
                <ul class="mb-0 small ps-3">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Summary KPI Cards -->
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100" style="border-left: 4px solid #f25c3b !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small text-uppercase fw-bold">Registered Members</div>
                            <div class="h2 fw-bold text-dark mb-0">{{ $membersCount }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-3 bg-light text-danger fs-3 d-flex align-items-center justify-content-center p-3">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100" style="border-left: 4px solid #091724 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small text-uppercase fw-bold">Association Events</div>
                            <div class="h2 fw-bold text-dark mb-0">{{ $eventsCount }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-3 bg-light text-dark fs-3 d-flex align-items-center justify-content-center p-3">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100" style="border-left: 4px solid #0d6efd !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small text-uppercase fw-bold">Gallery Photos</div>
                            <div class="h2 fw-bold text-dark mb-0">{{ $galleryCount }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-3 bg-light text-primary fs-3 d-flex align-items-center justify-content-center p-3">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100" style="border-left: 4px solid #198754 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small text-uppercase fw-bold">CFS Pass Requests</div>
                            <div class="h2 fw-bold text-dark mb-0">{{ $passesCount }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-3 bg-light text-success fs-3 d-flex align-items-center justify-content-center p-3">
                            <i class="bi bi-card-checklist"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $curTab = session('active_tab', 'members');
        @endphp

        <!-- Admin Management Navigation Tabs -->
        <div class="card border-0 shadow-sm rounded-3 bg-white mb-4">
            <div class="card-header bg-white border-bottom p-0">
                <ul class="nav nav-tabs border-0 px-3 pt-2" id="adminTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-dark border-0 py-3 px-4 {{ $curTab === 'members' ? 'active border-bottom border-danger border-3 text-danger' : '' }}" id="members-tab" data-bs-toggle="tab" data-bs-target="#tab-members" type="button" role="tab">
                            <i class="bi bi-people-fill text-danger me-1"></i> Members Directory ({{ $membersCount }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-dark border-0 py-3 px-4 {{ $curTab === 'events' ? 'active border-bottom border-danger border-3 text-danger' : '' }}" id="events-tab" data-bs-toggle="tab" data-bs-target="#tab-events" type="button" role="tab">
                            <i class="bi bi-calendar-event text-warning me-1"></i> Events Manager ({{ $eventsCount }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-dark border-0 py-3 px-4 {{ $curTab === 'gallery' ? 'active border-bottom border-danger border-3 text-danger' : '' }}" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#tab-gallery" type="button" role="tab">
                            <i class="bi bi-images text-primary me-1"></i> Gallery Uploads ({{ $galleryCount }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-dark border-0 py-3 px-4 {{ $curTab === 'passes' ? 'active border-bottom border-danger border-3 text-danger' : '' }}" id="passes-tab" data-bs-toggle="tab" data-bs-target="#tab-passes" type="button" role="tab">
                            <i class="bi bi-card-checklist text-success me-1"></i> CFS Passes Desk ({{ $passesCount }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-dark border-0 py-3 px-4 {{ $curTab === 'circulars' ? 'active border-bottom border-danger border-3 text-danger' : '' }}" id="circulars-tab" data-bs-toggle="tab" data-bs-target="#tab-circulars" type="button" role="tab">
                            <i class="bi bi-megaphone-fill text-danger me-1"></i> Circulars & Bulletins ({{ $circularsCount }})
                        </button>
                    </li>
                </ul>
            </div>

            <div class="card-body p-4">
                <div class="tab-content" id="adminTabContent">
                    
                    <!-- TAB 1: MEMBERS DIRECTORY -->
                    <div class="tab-pane fade {{ $curTab === 'members' ? 'show active' : '' }}" id="tab-members" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h5 fw-bold text-dark mb-0">Registered Association Members</h4>
                            <span class="badge bg-light text-dark border">Delete Enabled</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle border">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Member / Firm Name</th>
                                        <th>Registered Email</th>
                                        <th>Role</th>
                                        <th>Joined On</th>
                                        <th class="text-end">Action (Delete)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($members as $m)
                                        <tr>
                                            <td class="fw-bold text-muted">#{{ $m->id }}</td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $m->name }}</div>
                                            </td>
                                            <td>{{ $m->email }}</td>
                                            <td><span class="badge bg-success">Member</span></td>
                                            <td class="text-muted small">{{ $m->created_at->format('d M Y') }}</td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger py-1 px-2.5" onclick="triggerAnimatedDelete('{{ route('admin.members.destroy', $m->id) }}', '{{ addslashes($m->name) }}')">
                                                    <i class="bi bi-trash3 me-1"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">No members found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 2: EVENTS MANAGER -->
                    <div class="tab-pane fade {{ $curTab === 'events' ? 'show active' : '' }}" id="tab-events" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h5 fw-bold text-dark mb-0">Association Events & Circulars</h4>
                            <button type="button" class="btn btn-sm text-white fw-bold" style="background-color: #0b2530;" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                <i class="bi bi-plus-lg me-1"></i> Add New Event
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle border">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Event Title</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th class="text-end">Action (Delete)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $ev)
                                        <tr>
                                            <td class="fw-bold text-muted">#{{ $ev->id }}</td>
                                            <td class="fw-bold text-dark">{{ $ev->title }}</td>
                                            <td>{{ $ev->event_date ? $ev->event_date->format('d M Y') : 'TBA' }}</td>
                                            <td class="text-muted small">{{ $ev->location ?: 'Pipavav' }}</td>
                                            <td>
                                                <form action="{{ route('admin.events.status', $ev->id) }}" method="POST" class="d-inline-flex align-items-center gap-1">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm py-0.5 px-2 fw-bold text-uppercase border-0 shadow-sm" style="font-size: 0.75rem; width: auto; cursor: pointer; {{ $ev->status === 'upcoming' ? 'background-color: #fef3c7; color: #92400e;' : 'background-color: #f1f5f9; color: #475569;' }}">
                                                        <option value="upcoming" {{ $ev->status === 'upcoming' ? 'selected' : '' }}>UPCOMING</option>
                                                        <option value="completed" {{ $ev->status === 'completed' ? 'selected' : '' }}>COMPLETED</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger py-1 px-2.5" onclick="triggerAnimatedDelete('{{ route('admin.events.destroy', $ev->id) }}', '{{ addslashes($ev->title) }}')">
                                                    <i class="bi bi-trash3 me-1"></i>Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">No events listed yet. Click 'Add New Event' above.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 3: GALLERY UPLOADS -->
                    <div class="tab-pane fade {{ $curTab === 'gallery' ? 'show active' : '' }}" id="tab-gallery" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h5 fw-bold text-dark mb-0">Gallery Media Library</h4>
                            <button type="button" class="btn btn-sm text-white fw-bold" style="background-color: #0b2530;" data-bs-toggle="modal" data-bs-target="#uploadGalleryModal">
                                <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload New Image
                            </button>
                        </div>

                        <div class="row g-3">
                            @forelse($galleryImages as $img)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card h-100 border shadow-sm rounded-3 overflow-hidden">
                                        <div style="height: 160px; background: #000;">
                                            <img src="{{ asset($img->image_path) }}" class="w-100 h-100 object-fit-cover" alt="{{ $img->title }}">
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="badge bg-light text-dark border mb-1">{{ $img->category }}</div>
                                            <h6 class="card-title fw-bold text-dark text-truncate mb-2" title="{{ $img->title }}">{{ $img->title }}</h6>
                                            <button type="button" class="btn btn-sm btn-outline-danger w-100 py-1" onclick="triggerAnimatedDelete('{{ route('admin.gallery.destroy', $img->id) }}', '{{ addslashes($img->title ?: 'Gallery Photo') }}')">
                                                <i class="bi bi-trash3 me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5 text-muted">
                                    No gallery images uploaded yet. Click 'Upload New Image' above.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- TAB 4: CFS PASSES DESK -->
                    <div class="tab-pane fade {{ $curTab === 'passes' ? 'show active' : '' }}" id="tab-passes" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h5 fw-bold text-dark mb-0">CFS Pass Applications Received</h4>
                            <span class="badge bg-light text-dark border">Admin Verification & Status Updates</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle border">
                                <thead class="table-light">
                                    <tr>
                                        <th>Application No</th>
                                        <th>Applicant Name</th>
                                        <th>Mobile</th>
                                        <th>Type</th>
                                        <th>Card No</th>
                                        <th>Status</th>
                                        <th class="text-end">Update Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($passes as $p)
                                        <tr>
                                            <td class="fw-bold">{{ $p->application_no }}</td>
                                            <td class="fw-semibold text-uppercase">{{ $p->full_name }}</td>
                                            <td>{{ $p->mobile_no }}</td>
                                            <td><span class="badge bg-light text-dark border">{{ $p->application_type }}</span></td>
                                            <td>{{ $p->card_no ?: '-' }}</td>
                                            <td>
                                                @if($p->pass_status === 'Approve')
                                                    <span class="badge bg-success">Approve</span>
                                                @elseif($p->pass_status === 'Rejected')
                                                    <span class="badge bg-danger">Rejected</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <form action="{{ route('admin.passes.status', $p->id) }}" method="POST" class="d-inline-flex gap-1 justify-content-end">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="pass_status" class="form-select form-select-sm py-1" style="width: auto;">
                                                        <option value="Approve" {{ $p->pass_status === 'Approve' ? 'selected' : '' }}>Approve</option>
                                                        <option value="Pending" {{ $p->pass_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="Rejected" {{ $p->pass_status === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-sm btn-dark py-1">Set</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">No pass applications received yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 5: CIRCULARS & BULLETINS -->
                    <div class="tab-pane fade {{ $curTab === 'circulars' ? 'show active' : '' }}" id="tab-circulars" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h5 fw-bold text-dark mb-0">Circulars, Bulletins & Notices</h4>
                            <button type="button" class="btn btn-sm text-white fw-bold" style="background-color:#0b2530;" data-bs-toggle="modal" data-bs-target="#addCircularModal">
                                <i class="bi bi-plus-lg me-1"></i> Post New Circular
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle border">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:10%">Badge</th>
                                        <th style="width:22%">Title</th>
                                        <th style="width:32%">Body / Notice</th>
                                        <th style="width:10%">Date</th>
                                        <th style="width:10%">Status</th>
                                        <th class="text-end" style="width:16%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($circulars as $circ)
                                        <tr class="{{ $circ->trashed() ? 'opacity-50' : '' }}">
                                            <td>
                                                <span class="badge text-uppercase fw-bold" style="background:#c2410c;color:#fff;">{{ $circ->badge_label }}</span>
                                            </td>
                                            <td class="fw-bold text-dark" style="font-size:.9rem;">{{ $circ->title }}</td>
                                            <td class="text-secondary" style="font-size:.85rem;">{{ Str::limit($circ->body, 90) }}</td>
                                            <td class="text-muted small">{{ $circ->published_at ? $circ->published_at->format('d M Y') : $circ->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if($circ->trashed())
                                                    <span class="badge bg-secondary">Deleted</span>
                                                @elseif($circ->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                @unless($circ->trashed())
                                                    <form action="{{ route('admin.circulars.toggle', $circ->id) }}" method="POST" class="d-inline">
                                                        @csrf @method('PATCH')
                                                        <button type="submit" class="btn btn-sm {{ $circ->is_active ? 'btn-outline-warning' : 'btn-outline-success' }} py-1 px-2" title="{{ $circ->is_active ? 'Deactivate' : 'Activate' }}">
                                                            <i class="bi bi-{{ $circ->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                        </button>
                                                    </form>
                                                    <button type="button" class="btn btn-sm btn-outline-danger py-1 px-2" onclick="triggerAnimatedDelete('{{ route('admin.circulars.destroy', $circ->id) }}', '{{ addslashes($circ->title) }}')">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                @endunless
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center py-4 text-muted">No circulars yet. Click 'Post New Circular' to create one.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal: Add New Circular -->
<div class="modal fade" id="addCircularModal" tabindex="-1" aria-labelledby="addCircularModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.circulars.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addCircularModalLabel">
                        <i class="bi bi-megaphone-fill text-danger me-2"></i>Post New Circular / Bulletin
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Badge Label <span class="text-danger">*</span></label>
                            <select class="form-select" name="badge_label" required>
                                <option value="BULLETIN" selected>BULLETIN</option>
                                <option value="NOTICE">NOTICE</option>
                                <option value="CIRCULAR">CIRCULAR</option>
                                <option value="URGENT">URGENT</option>
                                <option value="ADVISORY">ADVISORY</option>
                                <option value="AMENDMENT">AMENDMENT</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Published Date</label>
                            <input type="date" class="form-control" name="published_at" value="{{ now()->toDateString() }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Title / Heading <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required placeholder="e.g. Statutory Notice:">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Circular Body / Notice Text <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="body" rows="4" required placeholder="Full text of the circular or notification..."></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label small fw-bold">Button Label (optional)</label>
                            <input type="text" class="form-control" name="link_label" placeholder="e.g. Read Guidelines">
                        </div>
                        <div class="col-md-7">
                            <label class="form-label small fw-bold">Button Link URL (optional)</label>
                            <input type="text" class="form-control" name="link_url" placeholder="e.g. /compliance or https://cbic.gov.in/...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn text-white fw-bold" style="background-color:#0b2530;">
                        <i class="bi bi-megaphone me-1"></i> Publish Circular
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Add New Event -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addEventModalLabel">Add New Association Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Event Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required placeholder="e.g. Annual General Meeting 2026">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Date</label>
                            <input type="date" class="form-control" name="event_date">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="upcoming" selected>Upcoming</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="e.g. Pipavav Port Auditorium">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Brief outline of the event..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Event Banner / Image (Optional)</label>
                        <input type="file" class="form-control" name="image" accept="image/*,.jpg,.jpeg,.png,.webp,.svg,.gif,.bmp,.avif,.ico,.tiff,.tif">
                        <div class="text-muted small mt-1">Accepts all image formats (JPG, PNG, WEBP, SVG, GIF, AVIF, BMP, etc.)</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn text-white fw-bold" style="background-color: #0b2530;">Publish Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Upload Gallery Image -->
<div class="modal fade" id="uploadGalleryModal" tabindex="-1" aria-labelledby="uploadGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="uploadGalleryModalLabel">Upload New Gallery Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Photo Title</label>
                        <input type="text" class="form-control" name="title" placeholder="e.g. Pipavav Terminal Berth Visit">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Category <span class="text-danger">*</span></label>
                        <select class="form-select" name="category" required>
                            <option value="Events & Delegations">Events & Delegations</option>
                            <option value="Workshops & Training">Workshops & Training</option>
                            <option value="Port Operations & Terminals" selected>Port Operations & Terminals</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Choose Image File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" accept="image/*,.jpg,.jpeg,.png,.webp,.svg,.gif,.bmp,.avif,.ico,.tiff,.tif" required>
                        <div class="text-muted small mt-1">Accepts all image formats (JPG, PNG, WEBP, SVG, GIF, AVIF, BMP, etc.)</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn text-white fw-bold" style="background-color: #0b2530;">Upload Image</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Animated Custom Delete Confirmation Modal -->
<div class="modal fade custom-delete-modal" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-body p-4 text-center">
                <div class="delete-danger-icon shadow-sm">
                    <i class="bi bi-trash3-fill"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1">Confirm Delete?</h4>
                <p class="text-secondary small mb-3" id="deleteItemDescription">
                    Are you sure you want to delete this item? 
                </p>
                
                <form id="globalDeleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light px-4 py-2 fw-semibold" data-bs-dismiss="modal" style="border: 1px solid #e2e8f0;">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger px-4 py-2 fw-bold shadow-sm">
                            <i class="bi bi-trash3 me-1"></i> Yes, Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function triggerAnimatedDelete(actionUrl, itemName) {
    const modalForm = document.getElementById('globalDeleteForm');
    const desc = document.getElementById('deleteItemDescription');
    modalForm.action = actionUrl;
    desc.innerHTML = `Are you sure you want to delete <strong>${itemName}</strong>?<br><span class="text-muted" style="font-size: 0.78rem;">The item will be deleted.</span>`;
    
    const myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    myModal.show();
}

// Preserve active tab on tab clicks via local storage or URL hash
document.addEventListener('DOMContentLoaded', function () {
    const tabEls = document.querySelectorAll('button[data-bs-toggle="tab"]');
    tabEls.forEach(function (tabEl) {
        tabEl.addEventListener('shown.bs.tab', function (event) {
            const targetId = event.target.getAttribute('data-bs-target').replace('#tab-', '');
            sessionStorage.setItem('pcba_admin_active_tab', targetId);
        });
    });

    const savedTab = sessionStorage.getItem('pcba_admin_active_tab');
    @if(!session('active_tab'))
        if (savedTab) {
            const btn = document.querySelector(`button[data-bs-target="#tab-${savedTab}"]`);
            if (btn) {
                const tab = new bootstrap.Tab(btn);
                tab.show();
            }
        }
    @endif
});
</script>
@endsection
