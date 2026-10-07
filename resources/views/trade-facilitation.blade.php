@extends('layouts.app')

@section('title', 'Trade Facilitation | PCBA Pipavav')
@section('meta_description', 'Faster clearance, better coordination, digital processes, and constructive dialogue between trade and authorities at Pipavav Port.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Trade Facilitation</span>
        </div>
        <div class="badge-tagline">
            Faster Clearance • Better Coordination • Digital Processes
        </div>
        <h1 class="page-hero-title">Trade Facilitation at Pipavav Port</h1>
        <p class="page-hero-subtitle">
            PCBA actively works towards improving the overall business environment at Pipavav Port by bringing operational matters to the attention of concerned authorities through constructive dialogue.
        </p>
    </div>
</section>

<!-- The 6 Pillars of Trade Facilitation Strip -->
<section class="py-4 bg-dark text-white border-bottom border-secondary border-opacity-25">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center justify-content-lg-between align-items-center gap-3 py-2 text-center text-uppercase fw-bold" style="font-size: 0.9rem; letter-spacing: 0.06em;">
            <div class="text-white"><i class="bi bi-lightning-charge text-danger me-2"></i>Faster Clearance</div>
            <div class="text-white-50 d-none d-lg-block">|</div>
            <div class="text-white"><i class="bi bi-people text-danger me-2"></i>Better Coordination</div>
            <div class="text-white-50 d-none d-lg-block">|</div>
            <div class="text-white"><i class="bi bi-laptop text-danger me-2"></i>Digital Processes</div>
            <div class="text-white-50 d-none d-lg-block">|</div>
            <div class="text-white"><i class="bi bi-shield-check text-danger me-2"></i>Regulatory Compliance</div>
            <div class="text-white-50 d-none d-lg-block">|</div>
            <div class="text-white"><i class="bi bi-award text-danger me-2"></i>Professional Standards</div>
            <div class="text-white-50 d-none d-lg-block">|</div>
            <div class="text-white"><i class="bi bi-globe-americas text-danger me-2"></i>Trade Facilitation</div>
        </div>
    </div>
</section>

<!-- Trade Facilitation Narrative -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <div class="eyebrow-badge">[ Proactive Engagement ]</div>
                <h2 class="section-lead-title mt-2 mb-3">BRIDGING INDUSTRY STAKEHOLDERS & GOVERNMENT AUTHORITIES</h2>
                <p class="section-desc mb-4">
                    PCBA actively works towards improving the overall business environment at Pipavav Port by bringing operational matters to the attention of the concerned authorities.
                </p>
                <div class="content-box content-box-highlight mb-4">
                    <p class="mb-0 text-secondary" style="font-size: 1.05rem; line-height: 1.7;">
                        <strong>PCBA believes that constructive dialogue between industry stakeholders and government authorities is essential for improving the efficiency of India's EXIM supply chain.</strong>
                    </p>
                </div>
                <p class="text-secondary" style="line-height: 1.7;">
                    Whether addressing dwell time reductions, terminal gate congestions, tariff classification nuances, or railway container availability, PCBA represents the collective voice of the customs broker fraternity with well-substantiated representations through proper constitutional channels.
                </p>
            </div>

            <div class="col-lg-5">
                <div class="p-4 rounded-4 bg-light border border-secondary border-opacity-25">
                    <h5 class="pillar-title d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-diagram-3-fill text-danger"></i> Stakeholder Coordination Network
                    </h5>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        <li class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-building text-primary fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Customs Commissionerate</strong>
                                <div class="text-muted small">Joint Trade Facilitation Committee (PTFC) meets, Open House sessions, and grievance redressals.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-water text-primary fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">APM Terminals Pipavav</strong>
                                <div class="text-muted small">Berthing line-ups, crane moves, gate turnaround speed, and direct port delivery (DPD) coordination.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-train-front text-primary fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Railways & DFC Operations</strong>
                                <div class="text-muted small">Western Dedicated Freight Corridor rake allocations and ICD dispatch synchronization.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-box-seam text-primary fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">CFS & Custodians</strong>
                                <div class="text-muted small">Container freight stations handling, de-stuffing, and bonded storage streamlining.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Practical Impact Areas -->
<section class="py-5 bg-light border-top border-secondary border-opacity-10">
    <div class="container py-4">
        <div class="text-center max-w-750 mx-auto mb-5">
            <div class="eyebrow-badge mx-auto">[ Measurable Impact ]</div>
            <h3 class="text-dark fw-bold text-uppercase mt-2">How PCBA Advances Ease of Doing Business</h3>
            <p class="text-muted">Direct positive outcomes achieved through structured representation and industry solidarity.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="content-box h-100">
                    <div class="pillar-icon"><i class="bi bi-clock-history"></i></div>
                    <h5 class="pillar-title">Dwell Time Reduction</h5>
                    <p class="pillar-text">Advocating for faceless assessment optimizations, automated OOC handovers, and paperless e-gatepasses to slash cargo holding times.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content-box h-100">
                    <div class="pillar-icon"><i class="bi bi-chat-heart"></i></div>
                    <h5 class="pillar-title">Grievance Escalation Cell</h5>
                    <p class="pillar-text">Prompt escalation of ICEGATE downtime, system transmission errors, or local customs bottleneck queries for early resolution.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content-box h-100">
                    <div class="pillar-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <h5 class="pillar-title">Supporting EXIM Growth</h5>
                    <p class="pillar-text">Promoting Pipavav as an agile, congestion-free maritime alternative for agricultural, chemical, minerals, and manufactured exports from Gujarat and North India.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RECENT DEVELOPMENT: TRADE FACILITATION & SCANNER FACILITY AT PIPAVAV PORT -->
<section class="py-5 bg-white border-top border-secondary border-opacity-10">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="eyebrow-badge">[ Recent Development • September 2026 ]</div>
                <h2 class="section-lead-title mt-2 mb-3">Trade Facilitation & Scanner Facility at Pipavav Port</h2>
                <h5 class="text-danger fw-bold mb-3">Strengthening Container Scanning & Trade Facilitation</h5>
                
                <p class="text-secondary" style="line-height: 1.7;">
                    Pipavav Customs Brokers Association (PCBA) actively supports initiatives aimed at strengthening trade facilitation, Customs efficiency and security infrastructure at Pipavav Port.
                </p>
                <p class="text-secondary" style="line-height: 1.7;">
                    Recently, PCBA participated in high-level discussions regarding the scanner facility and scanning capacity at Pipavav Port, along with the <strong>Additional Commissioners of Customs, Jamnagar</strong> and other maritime stakeholders.
                </p>
                <p class="text-secondary mb-4" style="line-height: 1.7;">
                    The discussions focused on improving the existing scanning infrastructure and operational capacity with the objective of facilitating the scanning of containers on a comprehensive basis, while maintaining the required Customs security and examination procedures.
                </p>
                <p class="text-secondary" style="line-height: 1.7;">
                    PCBA appreciates the continued coordination between Customs authorities, Port authorities, terminal operators, Customs Brokers and other stakeholders towards improving the efficiency of EXIM operations at Pipavav. PCBA remains committed to constructive engagement with Customs and Port authorities for continuous improvement of facilities and trade processes at Pipavav Port.
                </p>
            </div>

            <div class="col-lg-6">
                <!-- Focus Points Card -->
                <div class="content-box p-4 p-md-5" style="background: #fdfbf7; border: 1px solid #e2d9cc; border-left: 5px solid var(--color-accent-orange);">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="pillar-icon mb-0">
                            <i class="bi bi-upc-scan"></i>
                        </div>
                        <div>
                            <span class="badge bg-danger text-uppercase px-2 py-1">Core Focus Areas</span>
                            <h4 class="pillar-title h5 mb-0 mt-1">Our Strategic Objectives</h4>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-shield-check text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Strengthening Trade Facilitation</strong>
                                <div class="text-muted small">Elevating operational agility and responsiveness across Pipavav Port.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-speedometer text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Improving Scanner Capacity & Efficiency</strong>
                                <div class="text-muted small">Upgrading scanning throughput and reducing container holding turnarounds.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-boxes text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Supporting Comprehensive Container Scanning</strong>
                                <div class="text-muted small">Ensuring end-to-end non-intrusive container inspection seamlessly.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-people-fill text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Enhanced Customs-Trade Coordination</strong>
                                <div class="text-muted small">Fostering transparent, collaborative liaison between Customs and trade stakeholders.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-white rounded border border-light shadow-sm">
                            <i class="bi bi-arrow-repeat text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Faster & Transparent EXIM Processes</strong>
                                <div class="text-muted small">Facilitating faster, more transparent clearances in a secure Customs environment.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Note Caption -->
                    <div class="p-3 rounded-3" style="background: rgba(11, 26, 36, 0.05); border-left: 3px solid #091724;">
                        <div class="text-muted small fst-italic">
                            <i class="bi bi-camera-fill me-1 text-danger"></i> <strong>Gallery Caption:</strong> “Trade Facilitation & Scanner Facility discussions at Pipavav Port with Additional Commissioners of Customs, Jamnagar and stakeholders – September 2026.”
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
