@extends('layouts.app')

@section('title', 'Contact & Grievance Cell | PCBA Pipavav')
@section('meta_description', 'Contact the Pipavav Customs Brokers Association Secretariat at Port Pipavav, Gujarat. Operational assistance, membership desk, and trade facilitation.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Contact Us</span>
        </div>
        <div class="badge-tagline">
            Secretariat • Port Facilitation Desk • Grievance Support
        </div>
        <h1 class="page-hero-title">Contact PCBA Pipavav</h1>
        <p class="page-hero-subtitle">
            Get in touch with the Secretariat for membership inquiries, port operational escalation, training registrations, and trade facilitation matters.
        </p>
    </div>
</section>

<!-- Contact Form & Office Information -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Office Details -->
            <div class="col-lg-5">
                <div class="eyebrow-badge">[ Secretariat Office ]</div>
                <h2 class="section-lead-title mt-2 mb-3">CONNECT WITH OUR SECRETARIAT</h2>
                <p class="section-desc mb-4">
                    Our team is stationed at Port Pipavav to support members, customs brokers, and EXIM stakeholders.
                </p>

                <div class="content-box bg-light mb-4">
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="pillar-icon mb-0 flex-shrink-0">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <h6 class="text-dark fw-bold mb-1">Registered Address</h6>
                            <p class="text-muted small mb-0">
                                Pipavav Customs Brokers Association<br>
                                Port Pipavav, Post: Rampara-2,<br>
                                Taluka: Rajula, Dist. Amreli,<br>
                                Gujarat - 365560, India
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="pillar-icon mb-0 flex-shrink-0">
                            <i class="bi bi-envelope-at-fill"></i>
                        </div>
                        <div>
                            <h6 class="text-dark fw-bold mb-1">Official Email</h6>
                            <p class="text-muted small mb-0">
                                <a href="mailto:info@pcbapipavav.org" class="text-decoration-none text-secondary">info@pcbapipavav.org</a><br>
                                <a href="mailto:secretariat@pcbapipavav.org" class="text-decoration-none text-secondary">secretariat@pcbapipavav.org</a>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="pillar-icon mb-0 flex-shrink-0">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h6 class="text-dark fw-bold mb-1">Office Hours</h6>
                            <p class="text-muted small mb-0">
                                Mon – Sat: 09:30 AM to 06:30 PM<br>
                                Port Operational Coordination: 24/7
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Apex Affiliate Card -->
                <div class="p-3 rounded-3 bg-white border border-secondary border-opacity-25 d-flex align-items-center gap-3">
                    <i class="bi bi-shield-check text-primary fs-2"></i>
                    <div>
                        <div class="fw-bold text-dark">Member Association of FFFAI</div>
                        <div class="small text-muted">Federation of Freight Forwarders’ Associations in India</div>
                    </div>
                </div>
            </div>

            <!-- Contact Message Form -->
            <div class="col-lg-7">
                <div class="content-box p-4 p-md-5">
                    <div class="eyebrow-badge mb-2">[ Send Message ]</div>
                    <h3 class="text-dark fw-bold text-uppercase mb-2">Trade & Member Inquiry</h3>
                    <p class="text-muted small mb-4">
                        Fill out the form below and an association representative will respond promptly.
                    </p>

                    <form onsubmit="event.preventDefault(); alert('Your message has been submitted to the PCBA Secretariat. We will get back to you shortly.');">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Your Name *</label>
                                <input type="text" class="form-control" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Company / Broker Firm *</label>
                                <input type="text" class="form-control" placeholder="Company Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Email Address *</label>
                                <input type="email" class="form-control" placeholder="name@company.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Contact Number *</label>
                                <input type="tel" class="form-control" placeholder="+91 98765 43210" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark">Inquiry Nature *</label>
                                <select class="form-select" required>
                                    <option value="">Select subject matter</option>
                                    <option>Membership Application / Renewal</option>
                                    <option>Port Clearance / Operational Escalation</option>
                                    <option>Training & Skill Workshop Participation</option>
                                    <option>Customs Regulation 20 Compliance</option>
                                    <option>General Information / Media Inquiry</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark">Message / Issue Details *</label>
                                <textarea class="form-control" rows="5" placeholder="Please describe your query or port operational challenge in detail..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn-pcba-primary py-3 px-4">
                                    <i class="bi bi-send-fill"></i> Send Message to Secretariat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
