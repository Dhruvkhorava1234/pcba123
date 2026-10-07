@extends('layouts.app')

@section('title', 'Training & Skill Development | PCBA Pipavav')
@section('meta_description', 'Professional education, CBLR exam preparation, and skill-development workshops conducted by PCBA Pipavav in association with APM Terminals and JBS Academy.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Training & Skill Development</span>
        </div>
        <div class="badge-tagline">
            Capacity Building • Professional Education • Industry Preparedness
        </div>
        <h1 class="page-hero-title">Training & Skill Development</h1>
        <p class="page-hero-subtitle">
            PCBA places strong emphasis on professional education, continuous skill development, and examination preparedness for Customs Broker staff and aspiring logistics professionals.
        </p>
    </div>
</section>

<!-- Overview & Key Training Areas -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6">
                <div class="eyebrow-badge">[ Capacity Building ]</div>
                <h2 class="section-lead-title mt-2 mb-3">NURTURING KNOWLEDGE & OPERATIONAL MASTERY</h2>
                <p class="section-desc mb-3">
                    Modern maritime trade demands sharp legal acumen, digital speed, and rigorous adherence to changing tariff and customs classifications.
                </p>
                <p class="text-secondary" style="line-height: 1.7;">
                    The Association regularly organizes awareness and training programmes to elevate standard operating procedures, upskill field personnel, and equip member teams with proactive compliance insights.
                </p>
            </div>
            
            <!-- Highlight Case Study: Milestones -->
            <div class="col-lg-6">
                <!-- Kaushalya The Skill University Agreement (Recent Development) -->
                <div class="content-box content-box-highlight bg-light p-4 mb-4" style="border-left: 4px solid var(--color-accent-orange);">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-danger text-uppercase px-3 py-1">Recent Milestone • Agreement</span>
                        <span class="badge text-uppercase px-2 py-1 fs-8" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange);">Govt of Gujarat</span>
                    </div>
                    <h4 class="text-dark fw-bold mb-2">Kaushalya – The Skill University Collaboration</h4>
                    <p class="text-secondary small mb-3" style="line-height: 1.65;">
                        PCBA recently entered into an agreement with the <strong>Gujarat Skill Development ecosystem / Kaushalya – The Skill University, Government of Gujarat</strong>. The initiative is intended to create structured opportunities for skill development, professional training, and industry-oriented learning for persons associated with Customs Brokerage, logistics, freight forwarding and international trade.
                    </p>
                    <div class="p-2 text-center rounded mb-3" style="background: linear-gradient(135deg, #091724 0%, #1a2f42 100%); color: #ffffff;">
                        <span class="fw-bold text-white small">Industry + Education + Government = Skilled EXIM Workforce</span>
                    </div>
                    <div class="small text-muted fst-italic">
                        Connecting ground-level trade experience with structured academia for the next generation of logistics professionals.
                    </div>
                </div>

                <!-- 2024 APM & JBS Academy Milestone -->
                <div class="content-box bg-light p-4">
                    <span class="badge bg-secondary text-uppercase px-3 py-1 mb-2">Training Milestone</span>
                    <h5 class="text-dark fw-bold mb-2">Pipavav Port Multi-Session Training</h5>
                    <p class="text-secondary small mb-3" style="line-height: 1.65;">
                        In association with <strong>APM Terminals</strong> and <strong>JBS Academy</strong>, PCBA conducted multi-session training on Customs clearance and freight-forwarding regulations at Pipavav Port, with participation from <strong>more than 75 persons</strong>.
                    </p>
                    <div class="row g-2 text-center pt-2 border-top">
                        <div class="col-4">
                            <div class="fw-bold fs-5 text-dark">75+</div>
                            <div class="text-muted small">Trained Personnel</div>
                        </div>
                        <div class="col-4">
                            <div class="fw-bold fs-5 text-dark">3-Way</div>
                            <div class="text-muted small">PCBA × APM × JBS</div>
                        </div>
                        <div class="col-4">
                            <div class="fw-bold fs-5 text-dark">100%</div>
                            <div class="text-muted small">Hands-on Focus</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7 Core Training Focus Areas -->
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <div class="eyebrow-badge mx-auto">[ Curriculum & Modules ]</div>
                <h3 class="text-dark text-uppercase fw-bold">Training Programme Coverage</h3>
                <p class="text-muted max-w-750 mx-auto">Structured sessions designed to address practical day-to-day challenges and statutory competencies.</p>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-file-earmark-check"></i></div>
                    <h5 class="pillar-title">Customs Clearance Procedures</h5>
                    <p class="pillar-text">Step-by-step clearance protocols across DPD, RMS facilitation, physical examination criteria, and out-of-charge processes.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-folder-check"></i></div>
                    <h5 class="pillar-title">Import & Export Documentation</h5>
                    <p class="pillar-text">Precise filing of Bills of Entry, Shipping Bills, Certificates of Origin, Country of Origin (CAROTAR) rules, and packing lists.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-book"></i></div>
                    <h5 class="pillar-title">Customs Laws & Regulations</h5>
                    <p class="pillar-text">In-depth exploration of Customs Act 1962, CBLR 2018 provisions, classification jurisprudence, and valuation principles.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-truck"></i></div>
                    <h5 class="pillar-title">Freight Forwarding Procedures</h5>
                    <p class="pillar-text">Intermodal multimodal operations, container freight station (CFS) procedures, inland transit, and ocean bill of lading handling.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-laptop"></i></div>
                    <h5 class="pillar-title">Digital Customs Processes</h5>
                    <p class="pillar-text">Mastering ICEGATE 2.0 portal, e-Sanchit paperless uploads, faceless e-assessment queries, and digital gate passes.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="bi bi-shield-check"></i></div>
                    <h5 class="pillar-title">Compliance Requirements</h5>
                    <p class="pillar-text">KYC protocols, Authorized Economic Operator (AEO) compliance audits, statutory register maintenance, and post-clearance audits.</p>
                </div>
            </div>

            <div class="col-12 mb-4">
                <div class="pillar-card bg-light">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="pillar-icon mb-0"><i class="bi bi-tools"></i></div>
                            <div>
                                <h5 class="pillar-title mb-1">Practical Issues Faced by Brokers & EXIM Stakeholders</h5>
                                <p class="pillar-text">Open interactive sessions addressing on-ground bottlenecks, container detention disputes, system errors, and terminal liaisons.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GUJARAT SKILL ECOSYSTEM & KAUSHALYA UNIVERSITY PARTNERSHIP -->
<section class="py-5" style="background: #fdfbf7; border-top: 1px solid #e7dfd5; border-bottom: 1px solid #e7dfd5;">
    <div class="container py-3">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="eyebrow-badge">[ Strategic Education Partnership ]</div>
                <h2 class="section-lead-title mt-2 mb-3">Skill Development & Professional Training</h2>
                <h5 class="text-danger fw-bold mb-3">Strengthening Skills for the Customs & EXIM Sector</h5>
                <p class="text-secondary" style="line-height: 1.7;">
                    Professional education and skill development are among the key objectives of Pipavav Customs Brokers Association (PCBA).
                </p>
                <p class="text-secondary" style="line-height: 1.7;">
                    As part of its continuing commitment to developing skilled professionals in the Customs, logistics and EXIM sector, PCBA recently entered into an agreement with the <strong>Gujarat Skill Development ecosystem / Kaushalya – The Skill University, Government of Gujarat</strong>.
                </p>
                <p class="text-secondary" style="line-height: 1.7;">
                    The initiative is intended to create opportunities for skill development, professional training and industry-oriented learning for persons associated with Customs Brokerage, logistics, freight forwarding and international trade.
                </p>
                <p class="text-secondary mb-4" style="line-height: 1.7;">
                    The collaboration reflects PCBA's vision of connecting industry experience with structured skill development and creating better opportunities for the next generation of professionals. PCBA believes that continuous learning and professional development are essential for building a modern, compliant and efficient EXIM ecosystem.
                </p>
                <div class="p-3 text-center rounded-3 shadow-sm" style="background: linear-gradient(135deg, #091724 0%, #1a2f42 100%); color: #ffffff;">
                    <div class="small text-uppercase tracking-wider fw-bold text-warning mb-1 fs-8">Guiding Formula</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #ffffff;">
                        Industry + Education + Government = Skilled EXIM Workforce
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="content-box p-4 p-md-5 bg-white border border-2 border-primary border-opacity-10 shadow-sm rounded-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="pillar-icon mb-0">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div>
                            <span class="badge bg-danger text-uppercase px-2 py-1">Kaushalya University Mou</span>
                            <h4 class="pillar-title h5 mb-0 mt-1">Key Objectives of the Collaboration</h4>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Skill Development in Customs & EXIM Operations</strong>
                                <div class="text-muted small">Specialized training modules tailored for field customs clearance and documentation.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Practical Industry-Oriented Training</strong>
                                <div class="text-muted small">Hands-on knowledge mirroring real-world port, CFS, shipping line, and customs processes.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Awareness of Customs and Logistics Procedures</strong>
                                <div class="text-muted small">Comprehensive curriculum covering statutory guidelines, ICEGATE, and regulatory updates.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Development of Employment-Ready Professionals</strong>
                                <div class="text-muted small">Equipping youth and graduates with trade-ready competencies for logistics careers.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Training Opportunities for Young Professionals</strong>
                                <div class="text-muted small">Structured entry pathways and foundational internships for aspiring customs practitioners.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Continuous Professional Development (CPD)</strong>
                                <div class="text-muted small">Upskilling existing industry personnel to navigate digital reforms and compliance mandates.</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-2 bg-light rounded border border-light">
                            <i class="bi bi-check2-circle text-danger fs-5 mt-1"></i>
                            <div>
                                <strong class="text-dark">Bridging the Gap Between Industry & Skill Development</strong>
                                <div class="text-muted small">Aligning state university educational outcomes directly with port logistics requirements.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CBLR Exam Preparedness & Professional Support -->
<section class="py-5 bg-light border-top border-secondary border-opacity-10">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="eyebrow-badge">[ Aspirant Guidance ]</div>
                <h3 class="text-dark fw-bold text-uppercase mb-3">CBLR Examination & Career Development</h3>
                <p class="text-secondary" style="line-height: 1.7;">
                    PCBA also supports initiatives aimed at improving professional knowledge and examination preparedness for Customs Broker staff and aspiring Customs professionals preparing for Regulation 6 & Regulation 13 examinations under CBLR.
                </p>
                <div class="d-flex flex-column gap-3 mt-4">
                    <div class="d-flex align-items-start gap-3">
                        <i class="bi bi-check2-circle text-danger fs-4 mt-1"></i>
                        <div>
                            <strong class="text-dark">Syllabus Guidance & Study Resources</strong>
                            <div class="text-muted small">Access to curated question banks, case studies, and customs tariff interpretations.</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <i class="bi bi-check2-circle text-danger fs-4 mt-1"></i>
                        <div>
                            <strong class="text-dark">Senior Broker Mentorship</strong>
                            <div class="text-muted small">Direct insights and practical problem-solving guidance from seasoned maritime practitioners at Pipavav.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="content-box bg-white p-5 border border-2 border-danger border-opacity-25 shadow-sm">
                    <i class="bi bi-mortarboard-fill text-danger fs-1 mb-3 d-inline-block"></i>
                    <h4 class="text-dark fw-bold mb-2">Want to Request a Training Session?</h4>
                    <p class="text-muted small mb-4">
                        Member firms can request tailored workshops for their operations and documentation personnel.
                    </p>
                    <a href="{{ route('contact') }}" class="btn-pcba-primary">
                        <i class="bi bi-envelope-check"></i> Request Training Workshop
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
