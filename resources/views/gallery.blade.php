@extends('layouts.app')

@section('title', 'Photo & Media Gallery | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Explore photo gallery of Pipavav Customs Brokers Association (PCBA), trade facilitation meetings, port training sessions, delegations, and association milestones.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container-fluid px-3 px-md-4 px-xl-5 position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Gallery</span>
        </div>
        <div class="badge-tagline">
            Moments • Milestones • Port Engagements • Trade Facilitation
        </div>
        <h1 class="page-hero-title">Photo & Event Gallery</h1>
        <p class="page-hero-subtitle">
            Visual documentation of PCBA initiatives, port training workshops, Customs interaction seminars, and executive delegations at Pipavav Port, Gujarat.
        </p>
    </div>
</section>

<!-- Gallery Filter & Grid Section -->
<section class="py-5 bg-white">
    <div class="container-fluid px-3 px-md-4 px-xl-5 py-3">
        
        <!-- Filter Tabs -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <button type="button" class="btn btn-sm px-4 py-2 rounded-pill fw-bold gallery-filter active" data-filter="all" style="background: #091724; color: #fff; border: 1px solid #091724;">
                All Photos
            </button>
            <button type="button" class="btn btn-sm px-4 py-2 rounded-pill fw-semibold gallery-filter" data-filter="events" style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0;">
                Events & Delegations
            </button>
            <button type="button" class="btn btn-sm px-4 py-2 rounded-pill fw-semibold gallery-filter" data-filter="training" style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0;">
                Workshops & Training
            </button>
            <button type="button" class="btn btn-sm px-4 py-2 rounded-pill fw-semibold gallery-filter" data-filter="port" style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0;">
                Port Operations & Terminals
            </button>
        </div>

        <!-- Dynamic Gallery Grid -->
        <div class="row g-4" id="galleryGrid">
            @forelse($galleryImages as $img)
                @php
                    $cleanCategory = strtolower(trim($img->category));
                    if (str_contains($cleanCategory, 'event')) {
                        $catSlug = 'events';
                        $catBadge = 'Events';
                        $badgeClass = 'bg-warning text-dark';
                    } elseif (str_contains($cleanCategory, 'train') || str_contains($cleanCategory, 'workshop')) {
                        $catSlug = 'training';
                        $catBadge = 'Workshop';
                        $badgeClass = 'bg-success text-white';
                    } else {
                        $catSlug = 'port';
                        $catBadge = 'Port Terminal';
                        $badgeClass = 'bg-primary text-white';
                    }

                    $imageSrc = str_starts_with($img->image_path, 'images/') 
                                ? asset($img->image_path) 
                                : asset($img->image_path);
                @endphp
                <div class="col-md-6 col-lg-4 gallery-item" data-category="{{ $catSlug }}">
                    <div class="card h-100 border-0 rounded-3 overflow-hidden shadow-sm hover-shadow transition">
                        <div class="position-relative overflow-hidden" style="height: 260px; background: #091724;">
                            <img src="{{ $imageSrc }}" alt="{{ $img->title }}" class="w-100 h-100 object-fit-cover transition-transform" style="object-position: top center;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge {{ $badgeClass }} text-uppercase px-2.5 py-1.5 fs-8 fw-bold shadow-sm">{{ $catBadge }}</span>
                            </div>
                        </div>
                        <div class="card-body p-4 bg-light">
                            <div class="text-muted small mb-1"><i class="bi bi-camera me-1 text-danger"></i> PCBA Gallery</div>
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $img->title }}</h5>
                            <p class="card-text text-secondary small mb-0">
                                {{ $img->description ?? 'Official photograph documenting operations and activities of Pipavav Customs Brokers Association.' }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-images fs-1 d-block mb-2"></i>
                    No gallery images currently uploaded.
                </div>
            @endforelse
        </div>

        <!-- Bottom CTA -->
        <div class="mt-5 p-4 rounded-3 text-center border" style="background: #fdfbf7; border-color: #e2d9cc !important;">
            <h4 class="fw-bold text-dark mb-2">Have photos or event updates to share?</h4>
            <p class="text-secondary small max-w-600 mx-auto mb-3">
                Member firms and participants may submit official high-resolution event photographs to the PCBA Secretariat for inclusion in the official media archives.
            </p>
            <a href="{{ route('contact') }}" class="btn-pcba-primary py-2 px-4 fs-7 text-decoration-none">
                <i class="bi bi-envelope me-1"></i> Contact Secretariat
            </a>
        </div>

    </div>
</section>
@endsection

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterBtns = document.querySelectorAll('.gallery-filter');
        const items = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.style.background = '#f8fafc';
                    b.style.color = '#475569';
                    b.style.borderColor = '#e2e8f0';
                });

                btn.classList.add('active');
                btn.style.background = '#091724';
                btn.style.color = '#fff';
                btn.style.borderColor = '#091724';

                const filter = btn.getAttribute('data-filter');

                items.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection
