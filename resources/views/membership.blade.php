@extends('layouts.app')

@section('title', 'Membership | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Enroll as a member of PCBA Pipavav. Fulfill statutory Regulation 20 requirements and gain access to collective representation and port training.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Membership</span>
        </div>
        <div class="badge-tagline">
            Professional Fraternity • Regulation 20 Enrollment • Collective Representation
        </div>
        <h1 class="page-hero-title">PCBA Membership</h1>
        <p class="page-hero-subtitle">
            PCBA welcomes eligible Customs Brokers operating within the Pipavav Customs jurisdiction to become members of the Association and join our collective effort to support EXIM trade.
        </p>
    </div>
</section>

<!-- Membership Overview & Eligibility -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="eyebrow-badge">[ Join the Association ]</div>
                <h2 class="section-lead-title mt-2 mb-3">EMPOWERING CUSTOMS BROKERS AT PIPAVAV PORT</h2>
                <p class="section-desc mb-4">
                    PCBA welcomes eligible Customs Brokers operating within the Pipavav Customs jurisdiction to become members of the Association.
                </p>

                <div class="content-box content-box-highlight mb-4">
                    <h5 class="fw-bold text-dark mb-2">Statutory Requirement:</h5>
                    <p class="text-secondary mb-0" style="line-height: 1.7;">
                        As stipulated under <strong>Notification No. 52/2022-Customs (N.T.) Regulation 20</strong>, holding membership in the registered and recognised local Customs Brokers Association is an essential statutory compliance requirement for operating at a Customs station.
                    </p>
                </div>

                <h4 class="text-dark fw-bold text-uppercase mt-4 mb-3">Key Membership Benefits</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="pillar-card p-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-award-fill text-danger fs-5"></i>
                                <strong class="text-dark">Regulatory Standing</strong>
                            </div>
                            <p class="pillar-text small">Full statutory compliance under CBLR 2018 Regulation 20 with official certification.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pillar-card p-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-megaphone-fill text-danger fs-5"></i>
                                <strong class="text-dark">Collective Voice</strong>
                            </div>
                            <p class="pillar-text small">Representation in high-level trade facilitation committees (PTFC) and Customs meetings.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pillar-card p-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-mortarboard-fill text-danger fs-5"></i>
                                <strong class="text-dark">Free Training Access</strong>
                            </div>
                            <p class="pillar-text small">Exclusive participation in port training programmes with APM Terminals, JBS Academy, and FFFAI.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pillar-card p-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-bell-fill text-danger fs-5"></i>
                                <strong class="text-dark">Instant Circulars</strong>
                            </div>
                            <p class="pillar-text small">Priority broadcasts of customs public notices, tariff shifts, and terminal advisories.</p>
                        </div>
                    </div>
                </div>

                <!-- Eligibility Checklist -->
                <h4 class="text-dark fw-bold text-uppercase mt-5 mb-3">Eligibility Criteria</h4>
                <ul class="list-unstyled d-flex flex-column gap-2 text-secondary">
                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-success"></i> Valid Customs Broker License issued by Indian Customs (Regulation 7 / Regulation 8 CBLR).
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-success"></i> Intimation / Permission to operate within the Pipavav Customs Commissionerate jurisdiction.
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-success"></i> Undertaking to adhere to PCBA constitution, professional ethics, and statutory customs compliance.
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-success"></i> Valid KYC documents including PAN, GSTIN, and ICEGATE registration.
                    </li>
                </ul>
            </div>

            <!-- Online Application Action Panel -->
            <div class="col-lg-5">
                <div class="p-4 p-md-5 rounded-4 text-white shadow-sm h-100 d-flex flex-column justify-content-between" style="background: linear-gradient(135deg, #091724 0%, #1a2f42 100%); border-left: 5px solid var(--color-accent-orange);">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge text-uppercase px-3 py-1 fs-8 fw-bold" style="background: rgba(242, 92, 59, 0.2); color: #ff8a65; border: 1px solid rgba(242, 92, 59, 0.4);">
                                Official Enrollment
                            </span>
                            <i class="bi bi-ui-checks text-warning fs-3"></i>
                        </div>
                        <h3 class="h4 fw-bold text-white mb-2">Apply for PCBA Membership</h3>
                        <p class="text-white-50 small mb-4" style="line-height: 1.7;">
                            Ready to enroll your firm? Fill out the complete statutory membership registration form online with your branch particulars, CHA licenses, and parent custom house details.
                        </p>

                        <div class="p-3 bg-white bg-opacity-10 rounded-3 mb-4">
                            <div class="small fw-semibold text-warning text-uppercase mb-2">What you will need:</div>
                            <ul class="list-unstyled small text-white-50 mb-0 d-flex flex-column gap-2">
                                <li class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2 text-warning"></i> Company Type & Registered Address
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2 text-warning"></i> PAN / GSTIN / CHA License Details
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2 text-warning"></i> Authorized Person & Cardholder Info
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2 text-warning"></i> Operating Custom Houses Selection
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('membership.apply') }}" class="btn-pcba-primary w-100 justify-content-center py-3 fs-6">
                            <i class="bi bi-arrow-right-circle"></i> Open Membership Apply Form
                        </a>
                        <div class="text-center text-white-50 small mt-3">
                            <i class="bi bi-shield-check text-success me-1"></i> Regulation 20 CBLR 2018 Compliant Portal
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
