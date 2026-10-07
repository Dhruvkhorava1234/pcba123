@extends('layouts.app')

@section('title', 'Pipavav Customs Brokers Association | PCBA')
@section('meta_description', 'Connecting Customs Brokers • Facilitating Trade • Supporting EXIM Growth at Pipavav Port, Gujarat. Member Association of FFFAI.')

@section('content')
<!-- HERO SECTION (SPLIT SCREEN / FULL VIEWPORT) -->
<section class="hero-section" id="hero">
    <div class="hero-bg-overlay"></div>
    <!-- Local Port Banner Image -->
    <img src="{{ asset('images/banner.jpg') }}" alt="Pipavav Port Logistics & Customs Maritime Banner"
        class="hero-bg-image">

    <div class="container position-relative z-3">
        <div class="row align-items-center g-5">
            <!-- Left Column -->
            <div class="col-lg-7 hero-content">
                <div class="eyebrow-badge">
                    [ PCBA PIPAVAV PORT ]
                </div>

                <h1 class="hero-title">
                   <span style="color: #F25C3B;"> PIPAVAV </span>CUSTOMS <br><span class="highlight">BROKERS ASSOCIATION</span>
                </h1>

                <p class="hero-subtext fw-bold text-dark mb-2" style="letter-spacing: 0.04em;">
                    Professionalism • Compliance • Cooperation • Trade Facilitation
                </p>

                <p class="text-secondary mb-4" style="line-height: 1.65; max-width: 620px;">
                    Professional association representing Customs Brokers operating at Pipavav Port, Gujarat. Established in 2014 & Proud Member Association of the Federation of Freight Forwarders’ Associations in India (FFFAI).
                </p>

                <div class="hero-actions">
                    <a href="{{ route('membership') }}" class="btn-pcba-primary">
                        <i class="bi bi-person-check"></i> Become a Member
                    </a>
                    <a href="{{ route('about') }}" class="btn-pcba-secondary">
                        <i class="bi bi-info-circle"></i> About PCBA
                    </a>
                </div>
            </div>
        </div>

        <!-- Full-Width Bottom Floating Stats Counter Bar -->
        <div class="row mt-5">
            <div class="col-12 col-xl-11">
                <div class="stats-counter-bar stats-counter-bar-4">
                    <div class="stat-item">
                        <div class="stat-number">
                            <span>2014</span>
                        </div>
                        <div class="stat-label">Established</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">
                            <span data-target="33">0</span><span class="stat-plus">+</span>
                        </div>
                        <div class="stat-label">Members</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">
                            <span>FFFAI</span>
                        </div>
                        <div class="stat-label">Associated</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">
                            <span>FCBA</span>
                        </div>
                        <div class="stat-label">Associated</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LIVE NOTICE / BULLETIN STRIP (Dynamic from Admin) -->
@php
    $activeCirculars = \App\Models\Circular::active()->latest('published_at')->get();
    $mainCircular    = $activeCirculars->first();
    $extraCirculars  = $activeCirculars->skip(1);
@endphp

@if($mainCircular)
<style>
/* ── Circular Section Animations ───────────────────────────── */

/* Slide-in from top on load */
@keyframes circ-slide-in {
    0%   { opacity: 0; transform: translateY(-18px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* Pulse glow on the left accent border */
@keyframes circ-border-pulse {
    0%, 100% { box-shadow: -4px 0 0 0 #f25c3b, 0 2px 16px rgba(242,92,59,0.10); }
    50%       { box-shadow: -4px 0 0 0 #f25c3b, 0 4px 28px rgba(242,92,59,0.28); }
}

/* Badge heartbeat */
@keyframes circ-badge-beat {
    0%, 100% { transform: scale(1);    box-shadow: 0 0 0 0   rgba(194,65,12,0.45); }
    40%       { transform: scale(1.08); box-shadow: 0 0 0 7px rgba(194,65,12,0); }
}

/* Shimmer sweep across the card */
@keyframes circ-shimmer {
    0%   { background-position: -400px 0; }
    100% { background-position: 400px  0; }
}

/* Marquee horizontal scroll for extra circulars */
@keyframes circ-marquee {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* Button bounce on hover */
@keyframes circ-btn-bounce {
    0%, 100% { transform: translateY(0); }
    40%       { transform: translateY(-3px); }
    70%       { transform: translateY(1px); }
}

/* Dot blink for live indicator */
@keyframes circ-dot-blink {
    0%, 100% { opacity: 1; }
    50%       { opacity: 0.15; }
}

/* ── Circular card ─────────────────────────────────────────── */
.circ-main-card {
    position: relative;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e2d9cc;
    border-left: 4px solid #f25c3b;
    border-radius: 12px;
    padding: 16px 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;

    animation:
        circ-slide-in   0.55s cubic-bezier(0.22,1,0.36,1) both,
        circ-border-pulse 3s ease-in-out 1s infinite;
}

/* Shimmer overlay */
.circ-main-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(255,255,255,0)   0%,
        rgba(255,255,255,0.55) 50%,
        rgba(255,255,255,0)   100%
    );
    background-size: 400px 100%;
    animation: circ-shimmer 2.4s ease-in-out 0.6s 1;
    pointer-events: none;
    border-radius: inherit;
}

/* Live dot */
.circ-live-dot {
    display: inline-block;
    width: 8px; height: 8px;
    border-radius: 50%;
    background: #22c55e;
    animation: circ-dot-blink 1.4s ease-in-out infinite;
    flex-shrink: 0;
}

/* Badge */
.circ-badge {
    display: inline-block;
    background: #c2410c;
    color: #fff;
    font-weight: 800;
    font-size: 0.7rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 3px 9px;
    border-radius: 4px;
    animation: circ-badge-beat 2.2s ease-in-out 1.1s infinite;
    flex-shrink: 0;
}

/* CTA button */
.circ-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f25c3b;
    color: #fff !important;
    font-weight: 700;
    font-size: 0.83rem;
    padding: 6px 16px;
    border-radius: 6px;
    text-decoration: none;
    box-shadow: 0 3px 12px rgba(242,92,59,0.30);
    transition: box-shadow 0.2s, background 0.2s;
    flex-shrink: 0;
}
.circ-btn:hover {
    background: #d94e2e;
    box-shadow: 0 6px 20px rgba(242,92,59,0.40);
    animation: circ-btn-bounce 0.45s ease;
}

/* ── Marquee ticker for extras ─────────────────────────────── */
.circ-ticker-wrap {
    overflow: hidden;
    mask-image: linear-gradient(90deg, transparent 0%, black 6%, black 94%, transparent 100%);
    -webkit-mask-image: linear-gradient(90deg, transparent 0%, black 6%, black 94%, transparent 100%);
}
.circ-ticker-track {
    display: flex;
    gap: 48px;
    width: max-content;
    animation: circ-marquee 28s linear infinite;
}
.circ-ticker-track:hover { animation-play-state: paused; }
.circ-ticker-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    font-size: 0.83rem;
    color: #475569;
}
.circ-ticker-item .circ-ticker-badge {
    background: #c2410c;
    color: #fff;
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    padding: 1px 6px;
    border-radius: 3px;
    letter-spacing: 0.05em;
}
.circ-ticker-item a {
    color: #c2410c;
    font-weight: 600;
    text-decoration: none;
}
.circ-ticker-item a:hover { text-decoration: underline; }
.circ-ticker-sep {
    color: #cbd5e1;
    font-size: 1rem;
    user-select: none;
}
</style>

<section class="py-3" id="circulars" style="background:#fdfbf7; border-top:1px solid #e7dfd5; border-bottom:1px solid #e7dfd5;">
    <div class="container">

        {{-- ── MAIN CIRCULAR CARD ── --}}
        <div class="circ-main-card">
            <div class="d-flex align-items-center gap-2 flex-wrap" style="flex:1; min-width:0;">
                <span class="circ-live-dot" title="Live"></span>
                <span class="circ-badge">{{ $mainCircular->badge_label }}</span>
                <span class="fw-bold text-uppercase" style="color:#0b1a24; font-size:0.88rem; white-space:nowrap;">
                    {{ $mainCircular->title }}
                </span>
                <span style="color:#334155; font-size:0.92rem; line-height:1.5;">
                    {{ $mainCircular->body }}
                </span>
            </div>

            <div class="d-flex align-items-center gap-3 flex-shrink-0">
                <span class="text-muted" style="font-size:0.78rem; white-space:nowrap;">
                    {{ $mainCircular->published_at
                        ? $mainCircular->published_at->format('d M Y')
                        : $mainCircular->created_at->format('d M Y') }}
                </span>
                @if($mainCircular->link_label && $mainCircular->link_url)
                    <a href="{{ $mainCircular->link_url }}" class="circ-btn">
                        {{ $mainCircular->link_label }}
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                @endif
            </div>
        </div>

        {{-- ── EXTRA CIRCULARS — Marquee Ticker ── --}}
        @if($extraCirculars->count() > 0)
        <div class="mt-2 circ-ticker-wrap">
            <div class="circ-ticker-track">
                {{-- Duplicate for seamless loop --}}
                @foreach([$extraCirculars, $extraCirculars] as $tickerSet)
                    @foreach($tickerSet as $circ)
                        <span class="circ-ticker-item">
                            <span class="circ-ticker-badge">{{ $circ->badge_label }}</span>
                            <span class="fw-semibold text-dark" style="font-size:0.82rem;">{{ $circ->title }}</span>
                            <span>{{ Str::limit($circ->body, 80) }}</span>
                            @if($circ->link_label && $circ->link_url)
                                <a href="{{ $circ->link_url }}">{{ $circ->link_label }} &rarr;</a>
                            @endif
                        </span>
                        <span class="circ-ticker-sep">&#x2022;</span>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>
@endif

<!-- ABOUT BRIEF / INTRODUCTION SECTION -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="eyebrow-badge">[ About Us ]</div>
                <h2 class="section-lead-title mt-2 mb-3">Uniting Customs Brokers at Pipavav Port</h2>
                <p class="section-desc mb-4">
                    Pipavav Customs Brokers Association (PCBA) is a professional association representing Customs Brokers operating at Pipavav Port, Gujarat.
                </p>
                <p class="text-secondary" style="line-height: 1.7;">
                    Established in 2014, PCBA was formed with the objective of bringing Customs Brokers together on a common platform, promoting professional standards, facilitating smooth Customs clearance and strengthening coordination between Customs Brokers, Customs authorities, Port authorities and the EXIM trade.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('about') }}" class="btn-pcba-secondary">
                        <i class="bi bi-arrow-right"></i> Read Full Story & Vision
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Dual Association Cards: FFFAI & FCBA -->
                <div class="d-flex flex-column gap-3">
                    <div class="content-box bg-light border-2 border-primary border-opacity-10 p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="pillar-icon mb-0" style="width: 40px; height: 40px; font-size: 1.2rem;">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <div>
                                    <span class="badge bg-primary text-uppercase px-2 py-1 fs-8">Apex National Body</span>
                                    <h3 class="pillar-title h6 mb-0 mt-1">FFFAI – Federation of Freight Forwarders' Associations in India</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-secondary small mb-2" style="line-height: 1.6;">
                            PCBA is associated with FFFAI, the national-level organisation representing Customs Brokers and freight-forwarding associations across India, participating in the wider community and trade-facilitation matters.
                        </p>
                        <a href="{{ route('associations') }}" class="text-primary fw-semibold small text-decoration-none">
                            Learn More About FFFAI Association <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="content-box bg-light border-2 border-primary border-opacity-10 p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="pillar-icon mb-0" style="width: 40px; height: 40px; font-size: 1.2rem; background: rgba(14, 116, 144, 0.12); color: #0e7490;">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div>
                                    <span class="badge text-uppercase px-2 py-1 fs-8" style="background: #0e7490; color: #fff;">Brokers Federation</span>
                                    <h3 class="pillar-title h6 mb-0 mt-1">FCBA – Federation of Customs Brokers Associations</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-secondary small mb-2" style="line-height: 1.6;">
                            Supporting Customs Brokers Associations and Customs Brokers on Customs-related matters, regulatory issues and implementation of applicable Customs procedures.
                        </p>
                        <a href="{{ route('associations') }}" class="text-primary fw-semibold small text-decoration-none">
                            Learn More About FCBA Association <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR ASSOCIATIONS HIGHLIGHT STRIP -->
<section class="py-4" style="background: linear-gradient(135deg, #091724 0%, #162638 100%); color: #ffffff;">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <span class="badge text-uppercase px-3 py-1 fw-bold tracking-wider fs-8" style="background: rgba(242, 92, 59, 0.25); color: #ff8a65; border: 1px solid rgba(242, 92, 59, 0.4);">
                        Our Professional Network
                    </span>
                    <span class="fw-bold fs-6 text-white">PCBA &nbsp;|&nbsp; FFFAI &nbsp;|&nbsp; FCBA</span>
                </div>
                <p class="text-white-50 small mb-0 mt-2" style="line-height: 1.6;">
                    One Professional Community • Multiple Industry Platforms • Common Commitment to Trade Facilitation
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('associations') }}" class="btn-pcba-primary py-2 px-3 fs-7">
                    <i class="bi bi-diagram-3 me-1"></i> View Our Associations
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PRESIDENT'S SPOTLIGHT SECTION (MATCHING REFERENCE DESIGN) -->
<section class="president-spotlight-section border-top border-bottom border-secondary border-opacity-10" id="president">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left: Leader Portrait with Concentric Circles & Vibrant Orange Halo -->
            <div class="col-lg-6">
                <div class="president-visual-col">
                    <div class="concentric-rings-wrap">
                        <div class="concentric-ring ring-outer-3"></div>
                        <div class="concentric-ring ring-outer-2"></div>
                        <div class="concentric-ring ring-outer-1"></div>
                        
                        <!-- Solid Vibrant Orange Focus Disc -->
                        <div class="president-orange-disc"></div>

                        <!-- Portrait of President Pankaj Lodaya -->
                        <div class="president-floating-img-wrap">
                            <img src="{{ asset('images/president.jpeg') }}" alt="Pankaj Lodaya - President, Pipavav Customs Brokers Association (PCBA)" class="president-floating-img">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Quote Mark, Testimonial/Message, Author Lockup & Dots Indicator -->
            <div class="col-lg-6">
                <div class="ps-lg-3">
                    <!-- Stylized Quote Icon -->
                    <div class="president-quote-mark">
                        <i class="bi bi-quote"></i>
                    </div>

                    <!-- Leadership Quote Statement -->
                    <p class="president-quote-text">
                        "At PCBA, our focus is steadfast on championing the professional interests of Customs Brokers, ensuring robust compliance with Customs regulations, and fostering proactive collaboration between trade stakeholders, port authorities, and Customs administration."
                    </p>

                    <!-- Author Lockup: Avatar & Identification -->
                    <div class="president-author-lockup">
                        <div class="president-author-avatar">
                            <img src="{{ asset('images/president.jpeg') }}" alt="Pankaj Lodaya">
                        </div>
                        <div>
                            <h4 class="president-author-name">Pankaj Lodaya</h4>
                            <div class="president-author-title">President of PCBA</div>
                        </div>
                    </div>

                    <!-- Slider Pagination Dots (Matching Reference) -->
                    <!-- <div class="president-slider-dots">
                        <span class="president-dot active" title="President"></span>
                        <span class="president-dot" title="Executive Committee"></span>
                        <span class="president-dot" title="Association Secretariat"></span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISION & MISSION HIGHLIGHT -->
<section class="py-5 bg-light border-top border-bottom border-secondary border-opacity-10">
    <div class="container py-4">
        <div class="row g-4 align-items-stretch">
            <!-- Vision -->
            <div class="col-lg-5 d-flex">
                <div class="content-box w-100 d-flex flex-column justify-content-between p-4 p-md-5" style="background: #fdfbf7; border: 1px solid #e2d9cc; border-left: 5px solid var(--color-accent-orange);">
                    <div>
                        <div class="eyebrow-badge mb-2" style="background: rgba(242, 92, 59, 0.1); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.25);">[ Strategic Roadmap ]</div>
                        <h3 class="fw-bold mb-3" style="color: #0b1a24;">Our Vision</h3>
                        <p class="fs-5 fst-italic mb-4" style="color: #334155; line-height: 1.7;">
                            "To develop Pipavav as an efficient, transparent and professionally managed Customs and EXIM gateway by promoting cooperation, knowledge, technology and responsible Customs brokerage practices."
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('about') }}" class="btn-pcba-primary py-2 px-3 small">
                            Explore Our 8 Mission Pillars <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mission Preview -->
            <div class="col-lg-7 d-flex">
                <div class="content-box w-100 d-flex flex-column justify-content-between p-4 p-md-5">
                    <div>
                        <div class="eyebrow-badge mb-2">[ Core Objectives ]</div>
                        <h3 class="text-dark fw-bold mb-3">Our Mission Focus</h3>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check2-circle text-danger fs-5"></i>
                                    <span class="text-secondary small">Represent & protect legitimate professional interests of brokers</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check2-circle text-danger fs-5"></i>
                                    <span class="text-secondary small">Facilitate dialogue with Customs & Port authorities</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check2-circle text-danger fs-5"></i>
                                    <span class="text-secondary small">Promote compliance with Customs laws & ethical standards</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check2-circle text-danger fs-5"></i>
                                    <span class="text-secondary small">Encourage paperless & digital Customs procedures</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check2-circle text-danger fs-5"></i>
                                    <span class="text-secondary small">Provide continuous learning & training programmes</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check2-circle text-danger fs-5"></i>
                                    <span class="text-secondary small">Faster, smoother, and efficient EXIM clearance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KEY INITIATIVES & RECENT DEVELOPMENTS -->
<section class="py-5" style="background: #ffffff; border-top: 1px solid #e7dfd5;">
    <div class="container py-3">
        <div class="text-center max-w-750 mx-auto mb-5">
            <div class="eyebrow-badge mx-auto">[ Proactive Progress ]</div>
            <h2 class="section-lead-title mt-2">Key Initiatives & Recent Developments</h2>
            <p class="text-muted">
                Professionalism • Compliance • Cooperation • Trade Facilitation in action across Pipavav Port.
            </p>
        </div>

        <div class="row g-4 mb-4">
            <!-- Initiative 1: Trade Facilitation & Scanner Facility -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="background: #fdfbf7; border: 1px solid #e2d9cc !important;">
                    <div class="p-4 p-md-5 d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                <span class="badge text-uppercase px-3 py-1 fw-bold fs-8" style="background: #091724; color: #ffffff;">Initiative 01</span>
                                <span class="badge text-uppercase px-2 py-1 fs-8" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                                    <i class="bi bi-clock-history me-1"></i> Recent Milestone
                                </span>
                            </div>
                            <h3 class="h4 fw-bold mb-2" style="color: #0b1a24;">Trade Facilitation & Scanner Facility at Pipavav Port</h3>
                            <div class="fw-semibold text-danger mb-3" style="font-size: 0.95rem;">Strengthening Container Scanning & Trade Facilitation</div>
                            
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                Pipavav Customs Brokers Association (PCBA) actively supports initiatives aimed at strengthening trade facilitation, Customs efficiency and security infrastructure at Pipavav Port.
                            </p>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                Recently, PCBA participated in discussions regarding the scanner facility and scanning capacity at Pipavav Port, along with the <strong>Additional Commissioners of Customs, Jamnagar</strong> and other stakeholders.
                            </p>
                            <p class="text-secondary small mb-4" style="line-height: 1.7;">
                                The discussions focused on improving the existing scanning infrastructure and operational capacity with the objective of facilitating the scanning of containers on a comprehensive basis, while maintaining the required Customs security and examination procedures.
                            </p>

                            <div class="p-3 bg-white rounded-3 border mb-4" style="border-color: #e2d9cc !important;">
                                <div class="fw-bold text-dark small mb-2 text-uppercase d-flex align-items-center gap-2">
                                    <i class="bi bi-crosshair text-danger"></i> Our Strategic Focus
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Trade facilitation at Pipavav Port
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Comprehensive container scanning
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Scanner capacity & efficiency
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Customs-trade coordination
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gallery Caption Box -->
                            <div class="p-3 rounded-3 mb-4" style="background: rgba(11, 26, 36, 0.04); border-left: 3px solid #091724;">
                                <div class="text-muted small fst-italic">
                                    <i class="bi bi-camera me-1 text-danger"></i> <strong>Official Session:</strong> “Trade Facilitation & Scanner Facility discussions at Pipavav Port with Additional Commissioners of Customs, Jamnagar and stakeholders – September 2026.”
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('trade-facilitation') }}" class="btn-pcba-secondary w-100 justify-content-center text-center py-2 fs-7">
                                View Scanner & Facilitation Framework <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Initiative 2: Skill Development & Professional Training -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="background: #fdfbf7; border: 1px solid #e2d9cc !important;">
                    <div class="p-4 p-md-5 d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                <span class="badge text-uppercase px-3 py-1 fw-bold fs-8" style="background: #091724; color: #ffffff;">Initiative 02</span>
                                <span class="badge text-uppercase px-2 py-1 fs-8" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                                    <i class="bi bi-award me-1"></i> Landmark Agreement
                                </span>
                            </div>
                            <h3 class="h4 fw-bold mb-2" style="color: #0b1a24;">Skill Development & Professional Training</h3>
                            <div class="fw-semibold text-danger mb-3" style="font-size: 0.95rem;">Strengthening Skills for the Customs & EXIM Sector</div>
                            
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                Professional education and skill development are among the key objectives of Pipavav Customs Brokers Association (PCBA).
                            </p>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                As part of its continuing commitment to developing skilled professionals in the Customs, logistics and EXIM sector, PCBA entered into a landmark agreement with the <strong>Gujarat Skill Development ecosystem / Kaushalya – The Skill University, Government of Gujarat</strong>.
                            </p>
                            <p class="text-secondary small mb-4" style="line-height: 1.7;">
                                The initiative creates opportunities for structured professional training and industry-oriented learning for personnel associated with Customs Brokerage, logistics, freight forwarding and international trade.
                            </p>

                            <!-- Formula Pill -->
                            <div class="p-3 text-center rounded-3 mb-4" style="background: linear-gradient(135deg, #091724 0%, #1a2f42 100%); color: #ffffff;">
                                <div class="small text-uppercase tracking-wider fw-bold text-warning mb-1 fs-8">Synergistic Partnership</div>
                                <div class="fw-bold" style="font-size: 0.95rem; color: #ffffff;">
                                    Industry + Education + Government = Skilled EXIM Workforce
                                </div>
                            </div>

                            <div class="p-3 bg-white rounded-3 border mb-4" style="border-color: #e2d9cc !important;">
                                <div class="fw-bold text-dark small mb-2 text-uppercase d-flex align-items-center gap-2">
                                    <i class="bi bi-mortarboard text-danger"></i> Key Program Objectives
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Customs & EXIM skill training
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Practical industry-oriented learning
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Employment-ready professionals
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-secondary small">
                                            <i class="bi bi-check-circle-fill text-success fs-7"></i> Continuous workforce upskilling
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('training') }}" class="btn-pcba-secondary w-100 justify-content-center text-center py-2 fs-7">
                                View Kaushalya Skill Partnership <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 EXPLORATION SECTIONS / GRID -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-750 mx-auto mb-5">
            <div class="eyebrow-badge mx-auto">[ Association Portals ]</div>
            <h2 class="section-lead-title mt-2">Dedicated Sections & Resources</h2>
            <p class="text-muted">
                Navigate key PCBA portals covering regulatory compliance, training workshops, trade facilitation, and membership.
            </p>
        </div>

        <div class="row g-4">
            <!-- Box 1: Compliance -->
            <div class="col-md-6 col-lg-3">
                <div class="pillar-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="pillar-icon"><i class="bi bi-file-earmark-ruled"></i></div>
                        <h3 class="pillar-title h5">Regulatory Compliance</h3>
                        <p class="pillar-text mb-3">Notification No. 52/2022-Customs (N.T.) and Regulation 20 CBLR guidelines for brokers operating at Pipavav.</p>
                    </div>
                    <a href="{{ route('compliance') }}" class="small text-danger fw-bold text-decoration-none">
                        View Compliance Details &rarr;
                    </a>
                </div>
            </div>

            <!-- Box 2: Training -->
            <div class="col-md-6 col-lg-3">
                <div class="pillar-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="pillar-icon"><i class="bi bi-mortarboard"></i></div>
                        <h3 class="pillar-title h5">Training & Skills</h3>
                        <p class="pillar-text mb-3">Multi-session workshops with APM Terminals & JBS Academy (75+ attendees), CBLR exam guidance.</p>
                    </div>
                    <a href="{{ route('training') }}" class="small text-danger fw-bold text-decoration-none">
                        Explore Programmes &rarr;
                    </a>
                </div>
            </div>

            <!-- Box 3: Trade Facilitation -->
            <div class="col-md-6 col-lg-3">
                <div class="pillar-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="pillar-icon"><i class="bi bi-speedometer2"></i></div>
                        <h3 class="pillar-title h5">Trade Facilitation</h3>
                        <p class="pillar-text mb-3">Faster clearance, constructive dialogue with authorities, and proactive EXIM grievance redressal.</p>
                    </div>
                    <a href="{{ route('trade-facilitation') }}" class="small text-danger fw-bold text-decoration-none">
                        Facilitation Pillars &rarr;
                    </a>
                </div>
            </div>

            <!-- Box 4: Membership -->
            <div class="col-md-6 col-lg-3">
                <div class="pillar-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="pillar-icon"><i class="bi bi-person-plus"></i></div>
                        <h3 class="pillar-title h5">Membership Desk</h3>
                        <p class="pillar-text mb-3">Welcoming eligible Customs Brokers operating at Pipavav Port. Fulfill statutory enrollment and join our fraternity.</p>
                    </div>
                    <a href="{{ route('membership') }}" class="small text-danger fw-bold text-decoration-none">
                        Enrollment Kit &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection