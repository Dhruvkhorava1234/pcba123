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
                            <div class="h2 fw-bold text-dark mb-0">{{ $galleryCount }} <span class="fs-6 fw-normal text-muted">in {{ $foldersCount ?? 0 }} folders</span></div>
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-dark border-0 py-3 px-4 {{ $curTab === 'applications' ? 'active border-bottom border-danger border-3 text-danger' : '' }}" id="applications-tab" data-bs-toggle="tab" data-bs-target="#tab-applications" type="button" role="tab">
                            <i class="bi bi-file-earmark-person-fill text-info me-1"></i> Membership Applications ({{ $applicationsCount }})
                        </button>
                    </li>
                </ul>
            </div>

            <div class="card-body p-4">
                <div class="tab-content" id="adminTabContent">
                                       <!-- TAB 1: MEMBERS DIRECTORY -->
                    <div class="tab-pane fade {{ $curTab === 'members' ? 'show active' : '' }}" id="tab-members" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="h5 fw-bold text-dark mb-0">Registered Association Members</h4>
                                <span class="text-muted small">Official directory members. Click on any member name to view their full details.</span>
                            </div>
                            <span class="badge bg-light text-dark border">{{ $membersCount }} Total</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle border bg-white shadow-sm rounded-2">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">ID</th>
                                        <th>Member / Firm Name</th>
                                        <th>Registered Email</th>
                                        <th>Role</th>
                                        <th>Joined On</th>
                                        <th class="text-end" style="width: 170px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($members as $m)
                                        @php
                                            $appMatch = isset($appsByEmail) ? $appsByEmail->get(strtolower(trim($m->email))) : null;
                                        @endphp
                                        <tr>
                                            <td class="fw-bold text-muted">#{{ $m->id }}</td>
                                            <td>
                                                @if($appMatch)
                                                    <button type="button" class="btn btn-link p-0 text-start fw-bold text-primary text-decoration-none d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#appDetailModal_{{ $appMatch->id }}" title="Click to view full application details">
                                                        <i class="bi bi-building text-danger"></i>
                                                        <span>{{ $m->name }}</span>
                                                        <i class="bi bi-box-arrow-up-right ms-1 text-muted" style="font-size:0.75rem;"></i>
                                                    </button>
                                                    <div class="small text-muted"><i class="bi bi-patch-check-fill text-success me-1"></i>Membership Form Submitted (#{{ $appMatch->application_no }})</div>
                                                @else
                                                    <button type="button" class="btn btn-link p-0 text-start fw-bold text-dark text-decoration-none d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#userProfileModal_{{ $m->id }}" title="Click to view member profile">
                                                        <i class="bi bi-person-circle text-secondary"></i>
                                                        <span>{{ $m->name }}</span>
                                                        <i class="bi bi-info-circle ms-1 text-muted" style="font-size:0.75rem;"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td><a href="mailto:{{ $m->email }}" class="text-decoration-none text-muted">{{ $m->email }}</a></td>
                                            <td><span class="badge bg-success">Member</span></td>
                                            <td class="text-muted small">{{ $m->created_at->format('d M Y') }}</td>
                                            <td class="text-end">
                                                <div class="d-inline-flex gap-1">
                                                    @if($appMatch)
                                                        <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2.5" data-bs-toggle="modal" data-bs-target="#appDetailModal_{{ $appMatch->id }}" title="View Full Application Details">
                                                            <i class="bi bi-eye me-1"></i> Details
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2.5" data-bs-toggle="modal" data-bs-target="#userProfileModal_{{ $m->id }}" title="View Member Profile">
                                                            <i class="bi bi-person-lines-fill me-1"></i> Profile
                                                        </button>
                                                    @endif
                                                    <button type="button" class="btn btn-sm btn-outline-danger py-1 px-2" onclick="triggerAnimatedDelete('{{ route('admin.members.destroy', $m->id) }}', '{{ addslashes($m->name) }}')">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </div>
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

                    <!-- TAB: MEMBERSHIP APPLICATIONS -->
                    <div class="tab-pane fade {{ $curTab === 'applications' ? 'show active' : '' }}" id="tab-applications" role="tabpanel">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <div>
                                <h4 class="h5 fw-bold text-dark mb-0">
                                    <i class="bi bi-card-heading text-danger me-2"></i>Membership Applications
                                </h4>
                                <span class="text-muted small">Listed <strong>membership name wise</strong>. Click any member / firm name or "Details" to view all submitted form details and documents.</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 fw-bold">
                                    <i class="bi bi-people-fill me-1"></i> {{ $applicationsCount }} Applications
                                </span>
                            </div>
                        </div>

                        <!-- Live Filter & Search Controls -->
                        <div class="card border-0 bg-light p-3 mb-3 rounded-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-6 col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                        <input type="text" id="appSearchInput" class="form-control border-start-0" placeholder="Search by Member Name, Authorized Person, City, Email...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex justify-content-md-end gap-1 flex-wrap">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Status filter">
                                        <button type="button" class="btn btn-outline-dark active" onclick="filterAppStatus('all', this)">All ({{ $applicationsCount }})</button>
                                        <button type="button" class="btn btn-outline-success" onclick="filterAppStatus('Completed', this)">
                                            Paid ({{ $membershipApplications->where('payment_status', 'Completed')->count() }})
                                        </button>
                                        <button type="button" class="btn btn-outline-warning" onclick="filterAppStatus('Pending', this)">
                                            Pending ({{ $membershipApplications->where('payment_status', 'Pending')->count() }})
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" onclick="filterAppStatus('Failed', this)">
                                            Failed ({{ $membershipApplications->where('payment_status', 'Failed')->count() }})
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Membership Applications Table (Name Wise) -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle border bg-white shadow-sm rounded-2" id="membershipApplicationsTable">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Member / Firm Name</th>
                                        <th>Authorized Person</th>
                                        <th>Contact Details</th>
                                        <th>City & Type</th>
                                        <th>Fee & Status</th>
                                        <th>Submitted</th>
                                        <th class="text-end" style="width: 170px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($membershipApplications as $index => $app)
                                        @php
                                            $payload = $app->form_payload ?? [];
                                            $docs = $payload['uploaded_documents'] ?? [];
                                            $docCount = count($docs);
                                        @endphp
                                        <tr class="app-row" data-status="{{ $app->payment_status }}" data-name="{{ strtolower($app->company_name) }}" data-person="{{ strtolower($app->authorized_person) }}" data-city="{{ strtolower($app->city) }}" data-email="{{ strtolower($app->email) }}" data-mobile="{{ $app->mobile }}" data-appno="{{ strtolower($app->application_no) }}">
                                            <td class="text-muted fw-bold">{{ $index + 1 }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link p-0 text-start fw-bold text-primary text-decoration-none fs-6 d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#appDetailModal_{{ $app->id }}" title="Click to view all membership details">
                                                    <i class="bi bi-building text-danger"></i>
                                                    <span>{{ $app->company_name }}</span>
                                                    <i class="bi bi-box-arrow-up-right text-muted small" style="font-size:0.75rem;"></i>
                                                </button>
                                                <div class="d-flex align-items-center gap-2 mt-1">
                                                    <span class="badge bg-light text-muted border font-monospace" style="font-size:0.72rem;">#{{ $app->application_no }}</span>
                                                    @if($docCount > 0)
                                                        <span class="badge bg-info-subtle text-info border border-info-subtle" style="font-size:0.7rem;"><i class="bi bi-paperclip me-0.5"></i>{{ $docCount }} docs</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-semibold text-dark">{{ $app->authorized_person ?? '—' }}</div>
                                                <div class="small text-muted">{{ $app->authorized_designation ?? '—' }}</div>
                                            </td>
                                            <td>
                                                <div><a href="mailto:{{ $app->email }}" class="text-decoration-none text-muted small"><i class="bi bi-envelope me-1"></i>{{ $app->email }}</a></div>
                                                <div><a href="tel:{{ $app->mobile }}" class="text-decoration-none text-muted small"><i class="bi bi-telephone me-1"></i>{{ $app->mobile }}</a></div>
                                            </td>
                                            <td>
                                                <div class="fw-semibold text-dark">{{ $app->city ?? '—' }}</div>
                                                <div class="d-flex gap-1 mt-0.5">
                                                    <span class="badge bg-light text-dark border" style="font-size:0.7rem;">{{ $app->office_type ?? 'Office' }}</span>
                                                    <span class="badge bg-light text-muted border" style="font-size:0.7rem;">{{ $app->company_type ?? 'Firm' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-success" style="font-size:0.88rem;">₹{{ number_format($app->fee_amount, 2) }}</div>
                                                @if($app->payment_status === 'Completed')
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5" style="font-size:0.72rem;"><i class="bi bi-check-circle-fill me-1"></i>Completed</span>
                                                @elseif($app->payment_status === 'Failed')
                                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-0.5" style="font-size:0.72rem;"><i class="bi bi-x-circle-fill me-1"></i>Failed</span>
                                                @else
                                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2 py-0.5" style="font-size:0.72rem;"><i class="bi bi-clock-history me-1"></i>Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-muted small d-block">{{ $app->created_at->format('d M Y') }}</span>
                                                <span class="text-muted" style="font-size:0.72rem;">{{ $app->created_at->format('h:i A') }}</span>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-inline-flex gap-1">
                                                    <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2.5" data-bs-toggle="modal" data-bs-target="#appDetailModal_{{ $app->id }}" title="View All Details">
                                                        <i class="bi bi-eye me-1"></i> Details
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger py-1 px-2" onclick="triggerAnimatedDelete('{{ route('admin.applications.destroy', $app->id) }}', '{{ addslashes($app->company_name) }}')" title="Delete Application">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr id="noAppsRow">
                                            <td colspan="8" class="text-center py-5 text-muted">
                                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                                No membership applications submitted yet.
                                            </td>
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

                    <!-- TAB 3: GALLERY & FOLDERS -->
                    <div class="tab-pane fade {{ $curTab === 'gallery' ? 'show active' : '' }}" id="tab-gallery" role="tabpanel">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                            <div>
                                <h4 class="h5 fw-bold text-dark mb-1">Gallery Media & Folders</h4>
                                <p class="text-muted small mb-0">Organize photos into folders and upload new media to the public gallery.</p>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary fw-bold px-3" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                                    <i class="bi bi-folder-plus me-1"></i> New Folder
                                </button>
                                <button type="button" class="btn btn-sm text-white fw-bold px-3" style="background-color: #0b2530;" data-bs-toggle="modal" data-bs-target="#uploadGalleryModal">
                                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Image
                                </button>
                            </div>
                        </div>

                        <!-- FOLDERS SECTION -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark mb-3 d-flex align-items-center">
                                <i class="bi bi-folder2-open text-warning me-2 fs-5"></i>
                                Folders ({{ $galleryFolders->count() }})
                            </h6>
                            <div class="row g-3">
                                @forelse($galleryFolders as $f)
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <div class="card h-100 border shadow-sm rounded-3 overflow-hidden bg-white">
                                            <div class="p-3 d-flex align-items-start justify-content-between border-bottom bg-light">
                                                <div class="d-flex align-items-center gap-2 overflow-hidden">
                                                    <div class="bg-warning-subtle text-warning-emphasis p-2 rounded-2">
                                                        <i class="bi bi-folder-fill fs-4"></i>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <div class="fw-bold text-dark text-truncate" title="{{ $f->name }}">{{ $f->name }}</div>
                                                        <span class="badge bg-secondary-subtle text-secondary small">{{ $f->images_count }} {{ Str::plural('photo', $f->images_count) }}</span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-link text-danger p-0 ms-2" title="Delete Folder" onclick="triggerAnimatedDelete('{{ route('admin.gallery.folders.destroy', $f->id) }}', 'Folder: {{ addslashes($f->name) }}')">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                            <div class="p-3">
                                                <p class="text-secondary small mb-2 text-truncate-2" style="font-size: 0.8rem; min-height: 2.4em;">
                                                    {{ $f->description ?: 'No description provided.' }}
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                                    <span class="text-muted" style="font-size: 0.72rem;">Slug: {{ $f->slug }}</span>
                                                    <button type="button" class="btn btn-sm btn-link text-decoration-none fw-bold p-0 text-primary" style="font-size: 0.8rem;" onclick="prefillUploadFolder('{{ $f->id }}', '{{ addslashes($f->name) }}')">
                                                        <i class="bi bi-plus-circle me-1"></i> Add Photo
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-light border text-center py-4 mb-0">
                                            <i class="bi bi-folder-plus fs-2 text-muted d-block mb-1"></i>
                                            <div class="fw-semibold text-dark">No folders created yet</div>
                                            <p class="text-muted small mb-2">Create folders to organize photos for the public gallery.</p>
                                            <button type="button" class="btn btn-sm btn-outline-primary fw-bold" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                                                <i class="bi bi-plus me-1"></i> Create First Folder
                                            </button>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- ALL PHOTOS GRID -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                                    <i class="bi bi-images text-primary me-2 fs-5"></i>
                                    Uploaded Photos ({{ $galleryImages->count() }})
                                </h6>
                            </div>

                            <div class="row g-3">
                                @forelse($galleryImages as $img)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="card h-100 border shadow-sm rounded-3 overflow-hidden">
                                            <div class="position-relative overflow-hidden" style="height: 160px; background: #000;">
                                                <img src="{{ asset($img->image_path) }}" class="w-100 h-100 object-fit-cover" alt="{{ $img->title }}">
                                                @if($img->folder)
                                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75 text-white" style="font-size: 0.7rem;">
                                                        <i class="bi bi-folder-fill me-1 text-warning"></i> {{ $img->folder->name }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="card-body p-3">
                                                <h6 class="card-title fw-bold text-dark text-truncate mb-2" title="{{ $img->title }}">{{ $img->title }}</h6>
                                                <button type="button" class="btn btn-sm btn-outline-danger w-100 py-1" onclick="triggerAnimatedDelete('{{ route('admin.gallery.destroy', $img->id) }}', '{{ addslashes($img->title ?: 'Gallery Photo') }}')">
                                                    <i class="bi bi-trash3 me-1"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-5 text-muted">
                                        No gallery images uploaded yet. Click 'Upload Image' above.
                                    </div>
                                @endforelse
                            </div>
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

<!-- Modal: Create Gallery Folder -->
<div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.gallery.folders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="createFolderModalLabel">
                        <i class="bi bi-folder-plus text-warning me-2"></i>Create New Gallery Folder
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Folder Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required placeholder="e.g. Annual General Meeting 2026">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Folder Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Brief summary of photos in this folder..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Cover Image <span class="text-muted">(Optional)</span></label>
                        <input type="file" class="form-control" name="cover_image" accept="image/*">
                        <div class="text-muted small mt-1">If not uploaded, the first uploaded photo in this folder will automatically be used.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn text-white fw-bold" style="background-color: #0b2530;">Create Folder</button>
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
                    <h5 class="modal-title fw-bold" id="uploadGalleryModalLabel">
                        <i class="bi bi-images text-primary me-2"></i>Upload Gallery Photos
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Select Folder <span class="text-primary fw-normal">(Recommended)</span></label>
                        <select class="form-select" name="folder_id" id="uploadFolderSelect">
                            <option value="">-- No Folder (Unassigned) --</option>
                            @foreach($galleryFolders as $f)
                                <option value="{{ $f->id }}">{{ $f->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-muted small mt-1">Assign photos to a folder for clean folder-based gallery browsing.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Choose Photos <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="images[]" multiple accept="image/*,.jpg,.jpeg,.png,.webp,.svg,.gif,.bmp,.avif,.ico,.tiff,.tif" required id="galleryMultiInput" onchange="previewSelectedFiles(this)">
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="text-muted small">You can select multiple photos at once.</span>
                            <span class="badge bg-primary-subtle text-primary small" id="selectedFilesCount">0 selected</span>
                        </div>
                    </div>
                    <div id="selectedFilesPreview" class="d-flex flex-wrap gap-2 mt-2 pt-2 border-top d-none" style="max-height: 140px; overflow-y: auto;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn text-white fw-bold" style="background-color: #0b2530;">
                        <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Photos
                    </button>
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

<!-- ============================================================== -->
<!-- MEMBERSHIP APPLICATION DETAILS MODALS (CLICK MEMBER NAME TO VIEW) -->
<!-- ============================================================== -->
@foreach($membershipApplications as $app)
@php
    $payload = $app->form_payload ?? [];
    $docs = $payload['uploaded_documents'] ?? [];
    $docLabels = [
        'license_copy'            => 'Customs Licence Copy',
        'authorized_person_photo' => 'Authorized Person Photo',
        'license_exam_copy'       => 'Licence Examination Copy',
        'pan_card'                => 'Income Tax PAN Card',
        'gst_copy'                => 'GST Registration Certificate',
        'f_card_copy'             => 'Customs F-Card Copy',
        'company_logo'            => 'Company Logo / Letterhead',
    ];
@endphp
<div class="modal fade" id="appDetailModal_{{ $app->id }}" tabindex="-1" aria-labelledby="appDetailModalLabel_{{ $app->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-3 overflow-hidden">
            <!-- Modal Header -->
            <div class="modal-header text-white py-3 px-4" style="background: linear-gradient(135deg, #091724 0%, #17374a 100%);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-danger text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px; font-size: 1.35rem;">
                        <i class="bi bi-building"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-white mb-0" id="appDetailModalLabel_{{ $app->id }}">
                                {{ $app->company_name }}
                            </h5>
                            @if($app->payment_status === 'Completed')
                                <span class="badge bg-success text-white px-2.5 py-1"><i class="bi bi-check-circle-fill me-1"></i>Completed / Paid</span>
                            @elseif($app->payment_status === 'Failed')
                                <span class="badge bg-danger text-white px-2.5 py-1"><i class="bi bi-x-circle-fill me-1"></i>Failed</span>
                            @else
                                <span class="badge bg-warning text-dark px-2.5 py-1"><i class="bi bi-clock-history me-1"></i>Pending</span>
                            @endif
                            <span class="badge bg-white text-dark border px-2 py-1 font-monospace">#{{ $app->application_no }}</span>
                        </div>
                        <div class="small text-white-50 mt-0.5">
                            <i class="bi bi-geo-alt me-1"></i>{{ $app->city ?? 'Gujarat' }} &bull; Office: {{ $app->office_type ?? 'Main Office' }} &bull; Applied: {{ $app->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 bg-light">
                <!-- Summary Metric Cards -->
                <div class="row g-2 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-2.5 rounded-2 border shadow-xs text-center">
                            <span class="text-muted d-block small text-uppercase fw-semibold" style="font-size:0.7rem;">Office Type</span>
                            <span class="fw-bold text-dark">{{ $app->office_type ?? '—' }}</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-2.5 rounded-2 border shadow-xs text-center">
                            <span class="text-muted d-block small text-uppercase fw-semibold" style="font-size:0.7rem;">Constitution</span>
                            <span class="fw-bold text-dark">{{ $app->company_type ?? '—' }}</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-2.5 rounded-2 border shadow-xs text-center">
                            <span class="text-muted d-block small text-uppercase fw-semibold" style="font-size:0.7rem;">Membership Fee</span>
                            <span class="fw-bold text-success">₹{{ number_format($app->fee_amount, 2) }}</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-2.5 rounded-2 border shadow-xs text-center">
                            <span class="text-muted d-block small text-uppercase fw-semibold" style="font-size:0.7rem;">Documents</span>
                            <span class="fw-bold text-primary">{{ count($docs) }} Attached</span>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <!-- SECTION 1: Company & Office Details -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm rounded-3 h-100">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center gap-2">
                                <i class="bi bi-building text-danger fs-5"></i>
                                <h6 class="fw-bold mb-0 text-dark">Company & Office Details</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row g-2.5">
                                    <div class="col-12">
                                        <span class="text-muted small d-block">Company / Firm Name</span>
                                        <div class="fw-bold text-dark fs-6">{{ $app->company_name }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Office Type</span>
                                        <div class="fw-semibold text-dark">{{ $app->office_type ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Company Type / Constitution</span>
                                        <div class="fw-semibold text-dark">{{ $app->company_type ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">City</span>
                                        <div class="fw-semibold text-dark">{{ $app->city ?? '—' }}</div>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted small d-block">Registered Office Address</span>
                                        <div class="fw-semibold text-dark bg-light p-2 rounded border small">{{ $app->address ?? '—' }}</div>
                                    </div>
                                    @if($app->correspondence_address)
                                    <div class="col-12">
                                        <span class="text-muted small d-block">Correspondence Address</span>
                                        <div class="fw-semibold text-dark bg-light p-2 rounded border small">
                                            {{ $app->correspondence_address }}
                                            @if($app->correspondence_city)
                                                <div class="text-muted mt-1"><strong>City:</strong> {{ $app->correspondence_city }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Authorized Person & Contacts -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm rounded-3 h-100">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center gap-2">
                                <i class="bi bi-person-badge-fill text-primary fs-5"></i>
                                <h6 class="fw-bold mb-0 text-dark">Authorized Representative</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row g-2.5">
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Authorized Person Name</span>
                                        <div class="fw-bold text-dark fs-6">{{ $app->authorized_person ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Designation</span>
                                        <div class="fw-semibold text-dark">{{ $app->authorized_designation ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Official Email</span>
                                        <a href="mailto:{{ $app->email }}" class="fw-semibold text-primary text-decoration-none small">
                                            <i class="bi bi-envelope me-1"></i>{{ $app->email ?? '—' }}
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Mobile Number</span>
                                        <a href="tel:{{ $app->mobile }}" class="fw-semibold text-dark text-decoration-none small">
                                            <i class="bi bi-telephone me-1"></i>{{ $app->mobile ?? '—' }}
                                        </a>
                                    </div>
                                    @if(!empty($payload['tel_no']))
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Telephone / Landline</span>
                                        <div class="fw-semibold text-dark small">{{ $payload['tel_no'] }}</div>
                                    </div>
                                    @endif
                                    @if(!empty($payload['website_url']))
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Website</span>
                                        <a href="{{ $payload['website_url'] }}" target="_blank" class="fw-semibold text-primary text-decoration-none small">
                                            <i class="bi bi-globe me-1"></i>{{ $payload['website_url'] }} <i class="bi bi-box-arrow-up-right" style="font-size:0.65rem;"></i>
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($payload['alt_email_1']) || !empty($payload['alt_email_2']))
                                    <div class="col-12">
                                        <span class="text-muted small d-block">Alternative Email(s)</span>
                                        <div class="small text-dark">
                                            @if(!empty($payload['alt_email_1'])) <span class="badge bg-light text-dark border me-1">{{ $payload['alt_email_1'] }}</span> @endif
                                            @if(!empty($payload['alt_email_2'])) <span class="badge bg-light text-dark border">{{ $payload['alt_email_2'] }}</span> @endif
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($payload['alt_mobile_1']) || !empty($payload['alt_mobile_2']))
                                    <div class="col-12">
                                        <span class="text-muted small d-block">Alternative Mobile(s)</span>
                                        <div class="small text-dark">
                                            @if(!empty($payload['alt_mobile_1'])) <span class="badge bg-light text-dark border me-1">{{ $payload['alt_mobile_1'] }}</span> @endif
                                            @if(!empty($payload['alt_mobile_2'])) <span class="badge bg-light text-dark border">{{ $payload['alt_mobile_2'] }}</span> @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Business & Customs License Details -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center gap-2">
                                <i class="bi bi-briefcase-fill text-warning fs-5"></i>
                                <h6 class="fw-bold mb-0 text-dark">Customs Broker & Business License Information</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row g-3">
                                    <div class="col-sm-4 col-md-3">
                                        <span class="text-muted small d-block">Customs License No</span>
                                        <span class="badge bg-dark px-2.5 py-1.5 fs-7 font-monospace">{{ $app->customs_license_no ?? '—' }}</span>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <span class="text-muted small d-block">Income Tax PAN</span>
                                        <span class="fw-bold text-dark font-monospace">{{ $app->pan_number ?? '—' }}</span>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <span class="text-muted small d-block">GSTIN Number</span>
                                        <span class="fw-bold text-dark font-monospace">{{ $app->gstin_number ?? ($payload['gst_no'] ?? '—') }}</span>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <span class="text-muted small d-block">Parent Customs House</span>
                                        <span class="fw-semibold text-dark">{{ $payload['parent_customs_house'] ?? '—' }}</span>
                                    </div>

                                    @if(!empty($payload['old_cha_no']) || !empty($payload['old_cha_date']))
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Old CHA No & Date</span>
                                        <span class="fw-semibold text-dark small">{{ $payload['old_cha_no'] ?? '—' }} @if(!empty($payload['old_cha_date'])) ({{ $payload['old_cha_date'] }}) @endif</span>
                                    </div>
                                    @endif

                                    @if(!empty($payload['new_cha_no']) || !empty($payload['new_cha_date']))
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">New CHA No & Date</span>
                                        <span class="fw-semibold text-dark small">{{ $payload['new_cha_no'] ?? '—' }} @if(!empty($payload['new_cha_date'])) ({{ $payload['new_cha_date'] }}) @endif</span>
                                    </div>
                                    @endif

                                    <div class="col-sm-4 col-md-2">
                                        <span class="text-muted small d-block">Total Employees</span>
                                        <span class="fw-bold text-dark">{{ $payload['total_emp'] ?? '—' }}</span>
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <span class="text-muted small d-block">Emp with Pass</span>
                                        <span class="fw-bold text-success">{{ $payload['emp_with_pass'] ?? '—' }}</span>
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <span class="text-muted small d-block">Emp without Pass</span>
                                        <span class="fw-bold text-secondary">{{ $payload['emp_without_pass'] ?? '—' }}</span>
                                    </div>

                                    @if(!empty($payload['custom_stations']))
                                    <div class="col-12">
                                        <span class="text-muted small d-block mb-1">Custom Stations of Operation</span>
                                        @if(is_array($payload['custom_stations']))
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach($payload['custom_stations'] as $stn)
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">{{ $stn }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="fw-semibold text-dark">{{ $payload['custom_stations'] }}</span>
                                        @endif
                                    </div>
                                    @endif

                                    @if(!empty($payload['member_of_association']))
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Other Association Memberships</span>
                                        <span class="fw-semibold text-dark small">{{ $payload['member_of_association'] }}</span>
                                    </div>
                                    @endif

                                    @if(!empty($payload['agent_no']) || !empty($payload['agent_service_type']))
                                    <div class="col-sm-6">
                                        <span class="text-muted small d-block">Agent Info</span>
                                        <span class="fw-semibold text-dark small">No: {{ $payload['agent_no'] ?? '—' }} &bull; Service: {{ $payload['agent_service_type'] ?? '—' }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: Uploaded Documents & Photos -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-paperclip text-info fs-5"></i>
                                    <h6 class="fw-bold mb-0 text-dark">Uploaded Verification Documents & Photos</h6>
                                </div>
                                <span class="badge bg-light text-dark border">{{ count($docs) }} Uploaded</span>
                            </div>
                            <div class="card-body p-3">
                                @if(!empty($docs))
                                <div class="row g-3">
                                    @foreach($docs as $docKey => $docPath)
                                        @php
                                            $label = $docLabels[$docKey] ?? ucwords(str_replace('_', ' ', $docKey));
                                            $ext = strtolower(pathinfo($docPath, PATHINFO_EXTENSION));
                                            $isImg = in_array($ext, ['jpg','jpeg','png','gif','webp','bmp']);
                                        @endphp
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <div class="border rounded-3 p-3 bg-white h-100 d-flex flex-column align-items-center text-center shadow-xs">
                                                <div class="mb-2 d-flex align-items-center justify-content-center" style="width: 100%; height: 110px; background: #f8fafc; border-radius: 6px; overflow: hidden;">
                                                    @if($isImg)
                                                        <a href="{{ asset($docPath) }}" target="_blank" title="Click to view full image">
                                                            <img src="{{ asset($docPath) }}" alt="{{ $label }}" style="max-height: 105px; max-width: 100%; object-fit: contain;">
                                                        </a>
                                                    @else
                                                        <a href="{{ asset($docPath) }}" target="_blank" class="text-decoration-none">
                                                            <i class="bi bi-file-earmark-pdf-fill text-danger" style="font-size: 3.2rem;"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="fw-semibold text-dark small mb-2 text-truncate w-100" title="{{ $label }}">{{ $label }}</div>
                                                <div class="mt-auto w-100">
                                                    <a href="{{ asset($docPath) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100 py-1" style="font-size:0.75rem;">
                                                        <i class="bi bi-box-arrow-up-right me-1"></i> Open Document
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="text-center py-4 text-muted">
                                    <i class="bi bi-file-earmark-x fs-2 d-block mb-1"></i>
                                    No uploaded documents submitted with this application.
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 5: Payment & Transaction Details -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center gap-2">
                                <i class="bi bi-credit-card-2-front-fill text-success fs-5"></i>
                                <h6 class="fw-bold mb-0 text-dark">Payment & Transaction Details</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row g-3">
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Membership Fee</span>
                                        <div class="h5 fw-bold text-success mb-0">₹{{ number_format($app->fee_amount, 2) }}</div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Payment Status</span>
                                        @if($app->payment_status === 'Completed')
                                            <span class="badge bg-success px-2.5 py-1.5"><i class="bi bi-check-circle-fill me-1"></i>Completed / Paid</span>
                                        @elseif($app->payment_status === 'Failed')
                                            <span class="badge bg-danger px-2.5 py-1.5"><i class="bi bi-x-circle-fill me-1"></i>Failed</span>
                                        @else
                                            <span class="badge bg-warning text-dark px-2.5 py-1.5"><i class="bi bi-clock-history me-1"></i>Pending</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Razorpay Order ID</span>
                                        <div class="fw-semibold text-dark small font-monospace">{{ $app->razorpay_order_id ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Razorpay Payment ID</span>
                                        <div class="fw-semibold text-dark small font-monospace">{{ $app->razorpay_payment_id ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Official Receipt No</span>
                                        <div class="fw-semibold text-dark small font-monospace">{{ $app->receipt_no ?? '—' }}</div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <span class="text-muted small d-block">Paid At</span>
                                        <div class="fw-semibold text-dark small">{{ $app->paid_at ? $app->paid_at->format('d M Y, h:i A') : '—' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-white py-2.5 px-4 d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="triggerAnimatedDelete('{{ route('admin.applications.destroy', $app->id) }}', '{{ addslashes($app->company_name) }}')">
                    <i class="bi bi-trash3 me-1"></i> Delete Application
                </button>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="printApplicationModal('appDetailModal_{{ $app->id }}')">
                        <i class="bi bi-printer me-1"></i> Print Details
                    </button>
                    <button type="button" class="btn btn-sm btn-dark px-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- User Profile Modals for registered users in Tab 1 without application -->
@foreach($members as $m)
    @php
        $hasApp = isset($appsByEmail) && $appsByEmail->has(strtolower(trim($m->email)));
    @endphp
    @if(!$hasApp)
    <div class="modal fade" id="userProfileModal_{{ $m->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-3">
                <div class="modal-header bg-dark text-white py-3 px-4">
                    <h5 class="modal-title fw-bold text-white mb-0"><i class="bi bi-person-circle me-2"></i>{{ $m->name }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <span class="text-muted small d-block">Member Name</span>
                        <div class="fw-bold text-dark fs-5">{{ $m->name }}</div>
                    </div>
                    <div class="mb-3">
                        <span class="text-muted small d-block">Registered Email</span>
                        <div class="fw-semibold text-dark">{{ $m->email }}</div>
                    </div>
                    <div class="mb-3">
                        <span class="text-muted small d-block">Role</span>
                        <span class="badge bg-success">Member</span>
                    </div>
                    <div class="mb-3">
                        <span class="text-muted small d-block">Registration Date</span>
                        <div class="text-dark">{{ $m->created_at->format('d M Y, h:i A') }}</div>
                    </div>
                </div>
                <div class="modal-footer bg-light py-2 px-3">
                    <button type="button" class="btn btn-sm btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach

<script>
function triggerAnimatedDelete(actionUrl, itemName) {
    const modalForm = document.getElementById('globalDeleteForm');
    const desc = document.getElementById('deleteItemDescription');
    modalForm.action = actionUrl;
    desc.innerHTML = `Are you sure you want to delete <strong>${itemName}</strong>?<br><span class="text-muted" style="font-size: 0.78rem;">The item will be deleted.</span>`;
    
    const myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    myModal.show();
}

function prefillUploadFolder(folderId, folderName) {
    const select = document.getElementById('uploadFolderSelect');
    if (select) {
        select.value = folderId;
    }
    const myModal = new bootstrap.Modal(document.getElementById('uploadGalleryModal'));
    myModal.show();
}

function previewSelectedFiles(input) {
    const previewContainer = document.getElementById('selectedFilesPreview');
    const countBadge = document.getElementById('selectedFilesCount');
    if (!previewContainer || !countBadge) return;

    previewContainer.innerHTML = '';
    const files = input.files;
    countBadge.innerText = files.length + ' selected';

    if (files.length > 0) {
        previewContainer.classList.remove('d-none');
        Array.from(files).slice(0, 12).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const thumb = document.createElement('img');
                    thumb.src = e.target.result;
                    thumb.className = 'rounded border shadow-sm';
                    thumb.style.width = '42px';
                    thumb.style.height = '42px';
                    thumb.style.objectFit = 'cover';
                    thumb.title = file.name;
                    previewContainer.appendChild(thumb);
                };
                reader.readAsDataURL(file);
            }
        });
        if (files.length > 12) {
            const moreBadge = document.createElement('span');
            moreBadge.className = 'badge bg-secondary align-self-center';
            moreBadge.innerText = '+' + (files.length - 12) + ' more';
            previewContainer.appendChild(moreBadge);
        }
    } else {
        previewContainer.classList.add('d-none');
    }
}

// Filter Membership Applications by status and search query
let activeAppStatus = 'all';

function filterAppStatus(status, btn) {
    activeAppStatus = status;
    const buttons = document.querySelectorAll('[aria-label="Status filter"] button');
    buttons.forEach(b => b.classList.remove('active'));
    if (btn) {
        btn.classList.add('active');
    }
    applyAppFilters();
}

function applyAppFilters() {
    const q = (document.getElementById('appSearchInput')?.value || '').toLowerCase().trim();
    const rows = document.querySelectorAll('#membershipApplicationsTable tbody tr.app-row');
    let visibleCount = 0;

    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        const matchStatus = (activeAppStatus === 'all' || rowStatus === activeAppStatus);

        const rowName = row.getAttribute('data-name') || '';
        const rowPerson = row.getAttribute('data-person') || '';
        const rowCity = row.getAttribute('data-city') || '';
        const rowEmail = row.getAttribute('data-email') || '';
        const rowMobile = row.getAttribute('data-mobile') || '';
        const rowAppNo = row.getAttribute('data-appno') || '';

        const matchQuery = !q || (
            rowName.includes(q) ||
            rowPerson.includes(q) ||
            rowCity.includes(q) ||
            rowEmail.includes(q) ||
            rowMobile.includes(q) ||
            rowAppNo.includes(q)
        );

        if (matchStatus && matchQuery) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    const noRow = document.getElementById('noAppsRow');
    if (noRow) {
        noRow.style.display = (visibleCount === 0 && rows.length > 0) ? '' : 'none';
    }
}

document.getElementById('appSearchInput')?.addEventListener('input', applyAppFilters);

function printApplicationModal(modalId) {
    const modalEl = document.getElementById(modalId);
    if (!modalEl) return;
    const printContent = modalEl.querySelector('.modal-body').innerHTML;
    const title = modalEl.querySelector('.modal-title').innerText;
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>Membership Application - ${title}</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    body { padding: 25px; font-family: sans-serif; }
                    .card { border: 1px solid #ddd !important; margin-bottom: 15px; }
                    .card-header { font-weight: bold; }
                    a { text-decoration: none; color: inherit; }
                    .badge { border: 1px solid #ccc; color: #000; }
                </style>
            </head>
            <body>
                <h3 class="mb-3 text-primary">Pipavav Customs Brokers Association (PCBA)</h3>
                <h5 class="text-muted mb-4">Membership Application Details: ${title}</h5>
                ${printContent}
                <script>window.onload = function() { window.print(); window.close(); }<\/script>
            </body>
        </html>
    `);
    printWindow.document.close();
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
