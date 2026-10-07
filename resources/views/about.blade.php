@extends('layouts.app')

@section('title', 'About Us | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Learn about PCBA Pipavav, established in 2014, representing Customs Brokers at Pipavav Port, Gujarat. Proud member of FFFAI.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">About Us</span>
        </div>
        <div class="badge-tagline">
            Professionalism • Compliance • Cooperation • Trade Facilitation
        </div>
        <h1 class="page-hero-title">About Pipavav Customs Brokers Association</h1>
        <p class="page-hero-subtitle">
            Representing licensed Customs Brokers operating at Pipavav Port, Gujarat. Established in 2014 to elevate professional standards, foster institutional coordination, and advance India's EXIM supply chain.
        </p>
    </div>
</section>

<!-- About Details & FFFAI Affiliation -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <div class="eyebrow-badge">[ Established 2014 ]</div>
                <h2 class="section-lead-title mt-2 mb-3">PROFESSIONAL EXCELLENCE AT INDIA'S PREMIER GATEWAY PORT</h2>
                <p class="section-desc mb-4">
                    <strong>Pipavav Customs Brokers Association (PCBA)</strong> is a professional association representing Customs Brokers operating at Pipavav Port, Gujarat.
                </p>
                <div class="content-box content-box-highlight mb-4">
                    <p class="mb-0 text-secondary" style="font-size: 1.02rem; line-height: 1.7;">
                        Established in <strong>2014</strong>, PCBA was formed with the objective of bringing Customs Brokers together on a common platform, promoting professional standards, facilitating smooth Customs clearance and strengthening coordination between Customs Brokers, Customs authorities, Port authorities and the EXIM trade.
                    </p>
                </div>
                <p class="text-secondary" style="line-height: 1.7;">
                    The association plays a proactive bridging role among terminal operators (APM Terminals Pipavav), the Indian Customs Administration (CBIC), container train operators, freight forwarders, and logistics service providers to maintain transparent, friction-free cargo turnaround.
                </p>
            </div>

            <!-- Associations Affiliation Card (FFFAI & FCBA) -->
            <div class="col-lg-5">
                <div class="content-box bg-light border border-2 border-primary border-opacity-10 position-relative p-4 mb-3">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="pillar-icon mb-0">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <div>
                            <span class="badge bg-primary text-uppercase px-2 py-1">National Affiliations</span>
                            <h5 class="pillar-title mb-0 mt-1">FFFAI & FCBA Network</h5>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3" style="line-height: 1.65;">
                        PCBA maintains active professional associations with <strong>FFFAI</strong> (Federation of Freight Forwarders' Associations in India) and <strong>FCBA</strong> (Federation of Customs Brokers Associations).
                    </p>
                    <div class="p-3 bg-white rounded border border-secondary border-opacity-25 mb-3">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-info-circle text-primary fs-5 mt-1"></i>
                            <div class="small text-muted">
                                Together, these associations connect PCBA with national policy consultations, knowledge exchange, capacity building, and operational support across the Customs Brokerage fraternity.
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('associations') }}" class="btn-pcba-primary flex-grow-1 text-center justify-content-center py-2 fs-7">
                            <i class="bi bi-diagram-3 me-1"></i> View Our Associations
                        </a>
                        <a href="https://fffai.org" target="_blank" rel="noopener" class="btn-pcba-secondary text-center justify-content-center py-2 fs-7">
                            <i class="bi bi-box-arrow-up-right"></i> FFFAI
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="py-5 bg-light border-top border-bottom border-secondary border-opacity-10">
    <div class="container py-4">
        <div class="text-center max-w-750 mx-auto mb-5">
            <div class="eyebrow-badge mx-auto">[ Guiding Principles ]</div>
            <h2 class="section-lead-title mt-2">OUR VISION & MISSION</h2>
            <p class="text-muted">
                Driven by clear purpose to anchor Pipavav Port as India's most efficient, transparent, and technology-driven maritime gateway.
            </p>
        </div>

        <!-- Vision Banner -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-4 position-relative overflow-hidden shadow-sm" style="background: #fdfbf7; border: 1px solid #e2d9cc; border-left: 6px solid var(--color-accent-orange);">
                    <div class="row align-items-center">
                        <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-0">
                            <span class="badge text-uppercase px-3 py-2 fw-bold tracking-wider mb-2" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">Strategic Direction</span>
                            <h3 class="text-uppercase fw-bold mb-0" style="color: #0b1a24;">Our Vision</h3>
                        </div>
                        <div class="col-lg-9 border-start-lg border-secondary border-opacity-25 ps-lg-4">
                            <blockquote class="fs-5 fst-italic mb-0" style="color: #334155; line-height: 1.7;">
                                "To develop Pipavav as an efficient, transparent and professionally managed Customs and EXIM gateway by promoting cooperation, knowledge, technology and responsible Customs brokerage practices."
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission 8 Pillars Grid -->
        <div class="row mb-3">
            <div class="col-12 mb-3">
                <h4 class="text-dark fw-bold text-uppercase d-flex align-items-center gap-2">
                    <i class="bi bi-compass text-danger"></i> Our Mission Objectives
                </h4>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-shield-shaded"></i></div>
                    <h5 class="pillar-title">Member Protection</h5>
                    <p class="pillar-text">Represent and protect the legitimate professional interests of Customs Brokers operating at Pipavav.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-chat-left-dots"></i></div>
                    <h5 class="pillar-title">Stakeholder Dialogue</h5>
                    <p class="pillar-text">Facilitate effective communication between Customs Brokers, Customs authorities, Port authorities and other stakeholders.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-journal-bookmark"></i></div>
                    <h5 class="pillar-title">Legal Compliance</h5>
                    <p class="pillar-text">Promote compliance with Customs laws, regulations and high professional standards across operations.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-laptop"></i></div>
                    <h5 class="pillar-title">Digitalisation</h5>
                    <p class="pillar-text">Encourage digitalisation, transparency and paperless Customs processes at every clearance step.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-mortarboard"></i></div>
                    <h5 class="pillar-title">Continuous Training</h5>
                    <p class="pillar-text">Provide continuous learning, training and skill-development opportunities for all member personnel.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-person-workspace"></i></div>
                    <h5 class="pillar-title">Youth Empowerment</h5>
                    <p class="pillar-text">Support young professionals and promote knowledge of Customs clearance and EXIM procedures.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-megaphone"></i></div>
                    <h5 class="pillar-title">Grievance Redressal</h5>
                    <p class="pillar-text">Identify operational issues affecting EXIM trade and take them up with authorities through proper constitutional channels.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-speedometer2"></i></div>
                    <h5 class="pillar-title">Expedited Clearance</h5>
                    <p class="pillar-text">Contribute towards faster, smoother and more efficient import-export clearance at Pipavav Port.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to action bar -->
<section class="py-5 bg-white">
    <div class="container text-center py-2">
        <h3 class="fw-bold text-dark text-uppercase mb-3">Operating at Pipavav Port?</h3>
        <p class="text-secondary max-w-750 mx-auto mb-4">
            Join the accredited fraternity of Customs Brokers at Pipavav. Comply with statutory membership requirements and benefit from collective representation.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('membership') }}" class="btn-pcba-primary">
                <i class="bi bi-file-earmark-person"></i> Membership Information
            </a>
            <a href="{{ route('compliance') }}" class="btn-pcba-secondary">
                <i class="bi bi-shield-check"></i> View Regulation 20 Compliance
            </a>
        </div>
    </div>
</section>
@endsection
