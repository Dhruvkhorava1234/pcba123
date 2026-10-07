@extends('layouts.app')

@section('title', 'Events & Conclaves | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Upcoming and past events, trade conclaves, annual general meetings, and Customs facilitation sessions organized by Pipavav Customs Brokers Association.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container-fluid px-3 px-md-4 px-xl-5 position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Events</span>
        </div>
        <div class="badge-tagline">
            Seminars • Annual Meetings • Trade Conclaves • Stakeholder Roundtables
        </div>
        <h1 class="page-hero-title">Association Events & Seminars</h1>
        <p class="page-hero-subtitle">
            Explore forthcoming conferences, trade roundtables, statutory meetings, and previous interactive sessions hosted by PCBA at Pipavav Port and regional commercial hubs.
        </p>
    </div>
</section>

<!-- Events Section -->
<section class="py-5 bg-white">
    <div class="container-fluid px-3 px-md-4 px-xl-5 py-3">
        
        <!-- Section Header -->
        <div class="d-flex flex-column flex-md-row md:items-center justify-content-between gap-3 mb-5 pb-3 border-bottom">
            <div>
                <span class="badge bg-danger text-uppercase px-2.5 py-1 fs-8 fw-bold mb-2">PCBA Calendar</span>
                <h2 class="h3 fw-bold text-dark mb-0">Upcoming & Key Highlight Events</h2>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small"><i class="bi bi-info-circle me-1"></i> For registrations & delegations:</span>
                <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">Enquire Desk</a>
            </div>
        </div>

        <!-- Dynamic Events List / Cards -->
        <div class="row g-4 mb-5">
            @forelse($events as $event)
                @php
                    $dt = $event->event_date;
                    $month = $dt ? strtoupper($dt->format('M')) : 'TBA';
                    $day = $dt ? $dt->format('d') : '--';
                    $year = $dt ? $dt->format('Y') : date('Y');

                    $borderColor = $event->status === 'upcoming' ? '#f25c3b' : '#091724';
                    $statusBadge = $event->status === 'upcoming' 
                        ? '<span class="badge bg-warning text-dark text-uppercase px-2 py-0.5 fs-8 fw-bold mb-1">Upcoming Conclave</span>' 
                        : '<span class="badge bg-secondary text-uppercase px-2 py-0.5 fs-8 fw-bold mb-1">Completed Event</span>';
                @endphp
                <div class="col-lg-6">
                    <div class="card h-100 border rounded-3 p-4 shadow-sm hover-shadow transition" style="border-left: 5px solid {{ $borderColor }} !important;">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex items-center gap-3">
                                <div class="p-3 rounded-3 text-center text-white" style="background: #091724; min-width: 70px;">
                                    <div class="text-uppercase fw-bold fs-8" style="color: #f25c3b;">{{ $month }}</div>
                                    <div class="fs-3 fw-bold leading-none">{{ $day }}</div>
                                    <div class="fs-8 text-muted">{{ $year }}</div>
                                </div>
                                <div>
                                    {!! $statusBadge !!}
                                    <h4 class="h5 fw-bold text-dark mb-1">{{ $event->title }}</h4>
                                    <div class="text-muted small"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $event->location ?: 'Pipavav Port' }}</div>
                                </div>
                            </div>
                        </div>
                        <p class="text-secondary small mb-4" style="line-height: 1.7;">
                            {{ $event->description ?: 'Official PCBA association seminar and interactive roundtable for licensed Customs Brokers and EXIM logistics stakeholders.' }}
                        </p>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-3 border-top mt-auto">
                            <span class="text-muted small"><i class="bi bi-clock me-1 text-primary"></i> 10:00 AM – 05:00 PM IST</span>
                            <a href="{{ route('contact') }}" class="btn-pcba-primary py-2 px-3 fs-8 text-decoration-none">
                                <i class="bi bi-ticket-perforated me-1"></i> Register Delegate
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                    No events scheduled at this moment. Please check back later.
                </div>
            @endforelse
        </div>

        <!-- Interactive FAQ or Registration Info -->
        <div class="p-4 p-md-5 rounded-3 border" style="background: #fdfbf7; border-color: #e2d9cc !important;">
            <div class="row g-4 align-items-center">
                <div class="col-lg-8">
                    <span class="badge text-uppercase px-2.5 py-1 fs-8 fw-bold mb-2" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                        Member Participation Notice
                    </span>
                    <h3 class="h4 fw-bold text-dark mb-2">Host or Propose an Agenda Point for Forthcoming Roundtables</h3>
                    <p class="text-secondary small mb-0" style="line-height: 1.7;">
                        Customs Broker member firms registered with PCBA are entitled to suggest operational concerns, port dwell challenges, or procedural questions to be tabled during our monthly Permanent Trade Facilitation Committee (PTFC) and interactive seminars.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn-pcba-primary py-3 px-4 fs-7 text-decoration-none d-inline-block">
                        <i class="bi bi-send-fill me-1"></i> Submit Agenda Point
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
