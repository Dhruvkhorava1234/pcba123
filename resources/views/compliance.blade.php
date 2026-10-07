@extends('layouts.app')

@section('title', 'Regulatory Compliance & Notification 52/2022 | PCBA Pipavav')
@section('meta_description', 'PCBA and Regulatory Compliance under Notification No. 52/2022-Customs (N.T.) Regulation 20 for Customs Brokers operating at Pipavav Port.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Regulatory Compliance</span>
        </div>
        <div class="badge-tagline">
            Statutory Awareness • Regulation 20 • CBLR Compliance
        </div>
        <h1 class="page-hero-title">PCBA and Regulatory Compliance</h1>
        <p class="page-hero-subtitle">
            Ensuring a transparent, professional, and compliant Customs Brokerage ecosystem at Pipavav Port in accordance with CBIC notifications and the Customs Brokers Licensing Regulations.
        </p>
    </div>
</section>

<!-- Main Compliance Details -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="eyebrow-badge">[ Statutory Framework ]</div>
                <h2 class="section-lead-title mt-2 mb-3">CUSTOMS BROKERS LICENSING REGULATIONS & PCBA</h2>
                <p class="section-desc mb-4">
                    PCBA supports a professional and compliant Customs Brokerage ecosystem at Pipavav, facilitating awareness and implementation of applicable regulatory requirements while maintaining a cooperative approach with Customs and other stakeholders.
                </p>

                <!-- Legal Quote Card -->
                <div class="regulation-quote-card mb-4">
                    <span class="quote-label">
                        <i class="bi bi-file-earmark-text-fill text-danger me-1"></i> Notification No. 52/2022-Customs (N.T.) | Dated 24 June 2022
                    </span>
                    <h5 class="fw-bold text-dark mt-2 mb-3">Regulation 20 of the Customs Brokers Licensing Regulations (CBLR):</h5>
                    <p class="text-secondary fst-italic mb-3" style="line-height: 1.7; font-size: 1.05rem;">
                        "Under Notification No. 52/2022-Customs (N.T.) dated 24 June 2022, Regulation 20 of the Customs Brokers Licensing Regulations provides that a Customs Broker is required to enroll as a member of the Customs Brokers' Association at each jurisdiction where the Broker operates, where such an association exists, is registered at the Customs Station and is recognised by the competent Customs authority."
                    </p>
                    <div class="d-flex align-items-center gap-2 text-muted small">
                        <i class="bi bi-shield-lock-fill text-success"></i> Central Board of Indirect Taxes & Customs (CBIC), Ministry of Finance, Government of India.
                    </div>
                </div>

                <h4 class="text-dark fw-bold text-uppercase mt-4 mb-3">Implementation at Pipavav Customs Jurisdiction</h4>
                <p class="text-secondary" style="line-height: 1.7;">
                    The regulatory framework established by the Government of India aims to ensure high standards of accountability, ethical practice, and administrative coordination at all Customs stations. As the accredited and established association at Pipavav:
                </p>

                <div class="row g-3 my-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border border-secondary border-opacity-15 h-100">
                            <h6 class="text-dark fw-bold mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Statutory Enrollment</h6>
                            <p class="text-muted small mb-0">Enabling active Customs Brokers operating within Pipavav Port to satisfy mandatory local association enrollment guidelines smoothly.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border border-secondary border-opacity-15 h-100">
                            <h6 class="text-dark fw-bold mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Institutional Liaison</h6>
                            <p class="text-muted small mb-0">Serving as an authoritative bridge between member brokers and the Commissionerate of Customs at Pipavav.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border border-secondary border-opacity-15 h-100">
                            <h6 class="text-dark fw-bold mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Regulatory Circular Dissemination</h6>
                            <p class="text-muted small mb-0">Instant communication of Public Notices, Standing Orders, tariff modifications, and faceless assessment norms.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border border-secondary border-opacity-15 h-100">
                            <h6 class="text-dark fw-bold mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Code of Conduct & Ethics</h6>
                            <p class="text-muted small mb-0">Advancing professional integrity, anti-corruption compliance, and adherence to legal guidelines in cargo clearance.</p>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info border-0 rounded-3 p-4 mt-4">
                    <div class="d-flex align-items-start gap-3">
                        <i class="bi bi-lightbulb-fill text-primary fs-3 mt-1"></i>
                        <div>
                            <h5 class="alert-heading fw-bold mb-1">Cooperative Approach</h5>
                            <p class="mb-0 text-secondary" style="font-size: 0.95rem;">
                                PCBA works to facilitate awareness and implementation of applicable regulatory requirements while maintaining a cooperative approach with Customs, terminal operators, and all trade stakeholders.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-4">
                <div class="content-box bg-light mb-4">
                    <h5 class="pillar-title d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-check text-danger"></i> Compliance Checklist
                    </h5>
                    <ul class="list-unstyled mb-4">
                        <li class="py-2 border-bottom d-flex align-items-center justify-content-between">
                            <span class="small text-secondary">CBLR Regulation 20</span>
                            <span class="badge bg-success">Mandatory</span>
                        </li>
                        <li class="py-2 border-bottom d-flex align-items-center justify-content-between">
                            <span class="small text-secondary">Local Jurisdiction Enrollment</span>
                            <span class="badge bg-success">Active</span>
                        </li>
                        <li class="py-2 border-bottom d-flex align-items-center justify-content-between">
                            <span class="small text-secondary">FFFAI Apex Recognition</span>
                            <span class="badge bg-primary">Affiliated</span>
                        </li>
                        <li class="py-2 d-flex align-items-center justify-content-between">
                            <span class="small text-secondary">Station Registration</span>
                            <span class="badge bg-dark">Pipavav Port</span>
                        </li>
                    </ul>
                    <a href="{{ route('membership') }}" class="btn-pcba-primary w-100 justify-content-center">
                        <i class="bi bi-person-plus-fill"></i> Enroll as a Member
                    </a>
                </div>

                <div class="content-box">
                    <h6 class="fw-bold text-dark text-uppercase mb-3">Official CBIC Portal</h6>
                    <p class="text-muted small mb-3">
                        Access official CBIC gazettes, Customs notifications, and tariff schedules directly via the Central Board portal.
                    </p>
                    <a href="https://www.cbic.gov.in" target="_blank" rel="noopener" class="btn-pcba-secondary w-100 justify-content-center py-2 fs-7">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Visit CBIC Portal
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
