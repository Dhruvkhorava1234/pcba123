@extends('layouts.app')

@section('title', 'Our Professional Associations | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'PCBA maintains professional associations with recognised organisations representing the Customs Brokerage and freight-forwarding fraternity, including FFFAI and FCBA.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Our Associations</span>
        </div>
        <div class="badge-tagline">
            Connected with the Customs Brokerage Community
        </div>
        <h1 class="page-hero-title">Our Professional Associations</h1>
        <p class="page-hero-subtitle">
            Pipavav Customs Brokers Association (PCBA) maintains professional associations with recognised organisations representing the Customs Brokerage and freight-forwarding fraternity.
        </p>
    </div>
</section>

<!-- Network Statement Banner -->
<section class="py-4" style="background: #fdfbf7; border-bottom: 1px solid #e7dfd5;">
    <div class="container">
        <div class="p-4 rounded-3 shadow-sm" style="background: #ffffff; border: 1px solid #e2d9cc; border-left: 5px solid var(--color-accent-orange);">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <span class="badge text-uppercase px-2 py-1 fw-bold tracking-wider fs-8 mb-2" style="background: #091724; color: #ffffff;">Our Professional Network</span>
                    <h3 class="h5 fw-bold mb-1" style="color: #0b1a24;">PCBA &nbsp;|&nbsp; FFFAI &nbsp;|&nbsp; FCBA</h3>
                    <p class="text-secondary small mb-0" style="line-height: 1.65;">
                        One Professional Community &bull; Stronger Representation &bull; Better Customs Facilitation
                    </p>
                </div>
                <div class="text-nowrap">
                    <span class="badge px-3 py-2 text-uppercase fw-semibold" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                        One Community • Multiple Platforms
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Associations In-Depth Details -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Association 1: FFFAI -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden" style="background: #fdfbf7; border: 1px solid #e2d9cc !important;">
                    <div class="p-4 p-md-5 d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                <span class="badge text-uppercase px-3 py-1 fw-bold fs-8" style="background: #091724; color: #ffffff;">Apex Body</span>
                                <span class="badge text-uppercase px-2 py-1 fs-8" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                                    <i class="bi bi-award-fill me-1"></i> Associated
                                </span>
                            </div>

                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="pillar-icon mb-0" style="background: rgba(242, 92, 59, 0.1); color: var(--color-accent-orange); width: 54px; height: 54px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                    <i class="bi bi-diagram-3-fill"></i>
                                </div>
                                <div>
                                    <h2 class="h3 fw-bold mb-0" style="color: #0b1a24;">FFFAI</h2>
                                    <div class="text-secondary small fw-semibold">Apex Body of 33 Customs Brokers Associations in India</div>
                                </div>
                            </div>

                            <div class="p-3 bg-white rounded-3 border mb-4" style="border-color: #e2d9cc !important;">
                                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                                    PCBA is associated with <strong>FFFAI</strong>, the <strong>Apex body of 33 Customs Brokers Associations in India</strong>. FFFAI is the premier national-level apex organisation uniting Customs Brokers Associations across the country under one unified platform.
                                </p>
                            </div>

                            <h5 class="fw-bold text-dark small text-uppercase mb-3 d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle text-danger"></i> Engagement & Initiatives
                            </h5>

                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                Through its association with FFFAI, PCBA remains connected with the broader Customs Brokerage community and participates in apex-level initiatives, knowledge sharing and matters relating to trade facilitation and professional development across all 33 member Customs Brokers Associations.
                            </p>

                            <div class="p-3 rounded-3 mb-4" style="background: linear-gradient(135deg, #091724 0%, #1a2f42 100%); color: #ffffff;">
                                <div class="small text-uppercase tracking-wider fw-bold text-warning mb-1 fs-8">PCBA's Association with FFFAI Supports</div>
                                <div class="fw-bold" style="font-size: 0.95rem; color: #ffffff;">
                                    Apex Representation • Knowledge Sharing • Professional Development • Trade Facilitation • Interaction with Customs &amp; EXIM Stakeholders
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="https://fffai.org" target="_blank" rel="noopener" class="btn-pcba-secondary w-100 justify-content-center text-center py-2 fs-7">
                                Visit FFFAI Official Portal <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Association 2: FCBA -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden" style="background: #fdfbf7; border: 1px solid #e2d9cc !important;">
                    <div class="p-4 p-md-5 d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                <span class="badge text-uppercase px-3 py-1 fw-bold fs-8" style="background: #091724; color: #ffffff;">Fraternity Federation</span>
                                <span class="badge text-uppercase px-2 py-1 fs-8" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                                    <i class="bi bi-shield-check me-1"></i> Associated
                                </span>
                            </div>

                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="pillar-icon mb-0" style="background: rgba(14, 116, 144, 0.1); color: #0e7490; width: 54px; height: 54px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <h2 class="h3 fw-bold mb-0" style="color: #0b1a24;">FCBA</h2>
                                    <div class="text-secondary small fw-semibold">Federation of Customs Brokers Associations</div>
                                </div>
                            </div>

                            <div class="p-3 bg-white rounded-3 border mb-4" style="border-color: #e2d9cc !important;">
                                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                                    PCBA is also associated with the <strong>Federation of Customs Brokers Associations (FCBA)</strong>. FCBA provides a professional platform specifically focused on Customs-related matters and supporting Customs Brokers Associations and Customs Brokers.
                                </p>
                            </div>

                            <h5 class="fw-bold text-dark small text-uppercase mb-3 d-flex align-items-center gap-2">
                                <i class="bi bi-stars text-danger"></i> Through This Association, PCBA Can Seek Support On
                            </h5>

                            <div class="row g-2 mb-4">
                                <div class="col-12">
                                    <div class="d-flex align-items-start gap-2 text-secondary small py-1">
                                        <i class="bi bi-check-circle-fill text-success fs-7 mt-1"></i>
                                        <span><strong>Customs laws, regulations</strong> and procedures</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-start gap-2 text-secondary small py-1">
                                        <i class="bi bi-check-circle-fill text-success fs-7 mt-1"></i>
                                        <span><strong>Implementation</strong> of Customs-related provisions</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-start gap-2 text-secondary small py-1">
                                        <i class="bi bi-check-circle-fill text-success fs-7 mt-1"></i>
                                        <span><strong>Common operational issues</strong> faced by Customs Brokers</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-start gap-2 text-secondary small py-1">
                                        <i class="bi bi-check-circle-fill text-success fs-7 mt-1"></i>
                                        <span><strong>Representation</strong> of Customs Broker concerns before appropriate authorities</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-start gap-2 text-secondary small py-1">
                                        <i class="bi bi-check-circle-fill text-success fs-7 mt-1"></i>
                                        <span><strong>Support</strong> to Customs Brokers Associations</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-start gap-2 text-secondary small py-1">
                                        <i class="bi bi-check-circle-fill text-success fs-7 mt-1"></i>
                                        <span><strong>Communication and information</strong> relating to Customs matters</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="p-3 text-center rounded-3" style="background: rgba(14, 116, 144, 0.08); border: 1px dashed rgba(14, 116, 144, 0.3);">
                                <span class="small fw-semibold" style="color: #0e7490;">
                                    <i class="bi bi-building-check me-1"></i> Supporting Customs Brokers Associations & Members
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Summary Commitment Ribbon -->
<section class="py-5" style="background: linear-gradient(135deg, #091724 0%, #162638 100%); color: #ffffff;">
    <div class="container text-center py-2">
        <span class="badge text-uppercase px-3 py-2 fw-bold tracking-wider mb-3" style="background: rgba(242, 92, 59, 0.2); color: #ff8a65; border: 1px solid rgba(242, 92, 59, 0.4);">
            Our Professional Network
        </span>
        <h3 class="h2 fw-bold mb-3 text-white">One Professional Community &bull; Stronger Representation &bull; Better Customs Facilitation</h3>
        <p class="text-white-50 max-w-750 mx-auto mb-4" style="line-height: 1.7;">
            Through its associations with FFFAI and FCBA, PCBA seeks to strengthen professional coordination, remain connected with industry developments and provide appropriate support to its members on Customs, EXIM and trade-facilitation matters.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('membership') }}" class="btn-pcba-primary">
                <i class="bi bi-person-check"></i> Join PCBA Fraternity
            </a>
            <a href="{{ route('contact') }}" class="btn-pcba-secondary" style="border-color: rgba(255, 255, 255, 0.3); color: #ffffff;">
                <i class="bi bi-envelope"></i> Contact Secretariat
            </a>
        </div>
    </div>
</section>
@endsection
