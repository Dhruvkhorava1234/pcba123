<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PCBA | Pipavav Customs Brokers Association')</title>

    <!-- Meta Tags -->
    <meta name="description"
        content="@yield('meta_description', 'Pipavav Customs Brokers Association (PCBA) - Connecting Customs Brokers, Facilitating Trade, and Supporting EXIM Growth at Pipavav Port, Gujarat.')">
    <meta name="keywords"
        content="Pipavav Customs Brokers Association, PCBA, Customs Clearance Pipavav, APM Terminals Pipavav, FFFAI Member, Custom House Brokers, Port Logistics India, EXIM Pipavav">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'PCBA | Pipavav Customs Brokers Association')">
    <meta property="og:description"
        content="@yield('meta_description', 'Connecting Customs Brokers, Facilitating Trade, and Supporting EXIM Growth at Pipavav Port, Gujarat.')">
    <meta property="og:image" content="{{ asset('images/banner.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-trimmed.png') }}">

    <!-- Google Fonts: Space Grotesk & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Maritime Theme Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    @yield('extra_css')
</head>

<body>

    <!-- MARITIME VESSEL PORT ARRIVAL PRELOADER -->
    <div id="pcbaPortPreloader" class="pcba-preloader">
        <div class="preloader-content">
            <!-- Port & Ship Animation Stage -->
            <div class="port-scene">
                <!-- Sky / Light beacon sweep -->
                <div class="lighthouse-beam"></div>

                <!-- Port Terminal Dock & Gantry Crane (Right) -->
                <div class="port-dock-structure">
                    <!-- Crane Tower & Arm -->
                    <div class="quay-crane">
                        <div class="crane-boom"></div>
                        <div class="crane-cabin"></div>
                        <div class="crane-legs"></div>
                        <div class="crane-spreader"></div>
                    </div>
                    <!-- Dock Bollard -->
                    <div class="dock-quay"></div>
                </div>

                <!-- Animated Container Ship sailing from ocean to dock -->
                <div class="ship-vessel">
                    <!-- Ship Bridge / Superstructure -->
                    <div class="ship-bridge">
                        <div class="bridge-windows"></div>
                        <div class="ship-radar"></div>
                    </div>
                    <!-- Stacked Cargo Containers -->
                    <div class="cargo-stacks">
                        <div class="cargo-box c-orange"></div>
                        <div class="cargo-box c-blue"></div>
                        <div class="cargo-box c-green"></div>
                        <div class="cargo-box c-navy"></div>
                    </div>
                    <!-- Ship Hull Bow & Stern -->
                    <div class="ship-hull">
                        <div class="bulbous-bow"></div>
                        <div class="waterline-strip"></div>
                    </div>
                </div>

                <!-- Ocean Waves & Wake -->
                <div class="ocean-water">
                    <div class="wave wave-1"></div>
                    <div class="wave wave-2"></div>
                    <div class="wave wave-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 1. NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg pcba-navbar" id="mainNavbar">
        <div class="container-fluid px-3 px-md-4 px-xl-5">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="navbar-brand-wrapper">
                    <img src="{{ asset('images/logo-trimmed.png') }}" alt="PCBA Pipavav Logo" class="brand-logo-img">
                    <div class="d-none d-sm-block">
                        <span class="brand-title">PCBA <span>PIPAVAV</span></span>
                        <span class="brand-subtitle">Customs Brokers Association</span>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pcbaNavCollapse"
                aria-controls="pcbaNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="pcbaNavCollapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-1 {{ (request()->routeIs('compliance') || request()->routeIs('training') || request()->routeIs('trade-facilitation')) ? 'active' : '' }}" 
                           href="#" id="initiativesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Key Focus & Initiatives <i class="bi bi-chevron-down fs-8 ms-1"></i>
                        </a>
                        <ul class="dropdown-menu pcba-dropdown-menu shadow-sm" aria-labelledby="initiativesDropdown">
                            <li>
                                <a class="dropdown-item py-2 {{ request()->routeIs('compliance') ? 'active' : '' }}" href="{{ route('compliance') }}">
                                    <i class="bi bi-shield-check text-warning me-2"></i> Compliance
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 {{ request()->routeIs('training') ? 'active' : '' }}" href="{{ route('training') }}">
                                    <i class="bi bi-mortarboard text-warning me-2"></i> Training & Skills
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 {{ request()->routeIs('trade-facilitation') ? 'active' : '' }}" href="{{ route('trade-facilitation') }}">
                                    <i class="bi bi-speedometer2 text-warning me-2"></i> Trade Facilitation
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-1 {{ (request()->routeIs('membership') || request()->routeIs('membership.apply') || request()->routeIs('membership.search')) ? 'active' : '' }}" 
                           href="#" id="membershipDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Membership <i class="bi bi-chevron-down fs-8 ms-1"></i>
                        </a>
                        <ul class="dropdown-menu pcba-dropdown-menu pcba-dropdown-menu-wide shadow-sm" aria-labelledby="membershipDropdown">
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center gap-2 {{ request()->routeIs('membership') ? 'active' : '' }}" href="{{ route('membership') }}">
                                    <i class="bi bi-file-earmark-person text-warning fs-6"></i>
                                    <div>
                                        <div class="fw-bold">Membership Overview</div>
                                        <div class="text-muted" style="font-size: 0.76rem; font-weight: normal;">Eligibility criteria & benefits</div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center gap-2 {{ request()->routeIs('membership.apply') ? 'active' : '' }}" href="{{ route('membership.apply') }}">
                                    <i class="bi bi-ui-checks text-danger fs-6"></i>
                                    <div>
                                        <div class="fw-bold d-flex align-items-center gap-2">
                                            Membership Apply
                                            <span class="badge bg-danger text-uppercase px-1 py-0 fs-8">Direct Form</span>
                                        </div>
                                        <div class="text-muted" style="font-size: 0.76rem; font-weight: normal;">Official online registration portal</div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center gap-2 {{ request()->routeIs('membership.search') ? 'active' : '' }}" href="{{ route('membership.search') }}">
                                    <i class="bi bi-search text-primary fs-6"></i>
                                    <div>
                                        <div class="fw-bold d-flex align-items-center gap-2">
                                            Membership Search
                                            <span class="badge bg-primary text-uppercase px-1 py-0 fs-8">Directory</span>
                                        </div>
                                        <div class="text-muted" style="font-size: 0.76rem; font-weight: normal;">Search registered customs brokers & members</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('associations') ? 'active' : '' }}" href="{{ route('associations') }}">Our Associations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('events') ? 'active' : '' }}" href="{{ route('events') }}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <!-- <a href="{{ route('membership.apply') }}" class="btn-pcba-secondary py-2 px-3 fs-7 text-decoration-none">
                        <i class="bi bi-file-earmark-plus"></i> Apply Form
                    </a> -->
                    
                    @auth
                        <div class="dropdown">
                            <button class="btn-pcba-primary py-2 px-3 fs-7 dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="userNavDropdown">
                                <div class="user-nav-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                <div class="d-flex flex-column align-items-start lh-1">
                                    <span class="user-nav-welcome">Welcome</span>
                                    <span class="user-nav-name text-uppercase fw-bold">{{ Str::limit(Auth::user()->name, 22) }}</span>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end pcba-dropdown-menu pcba-user-dropdown" aria-labelledby="userNavDropdown">
                                {{-- User Identity Header --}}
                                <li>
                                    <div class="pcba-user-dropdown-header">
                                        <div class="pcba-user-dropdown-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                        <div class="pcba-user-dropdown-info">
                                            <div class="pcba-user-dropdown-name">{{ Auth::user()->name }}</div>
                                            <div class="pcba-user-dropdown-email">{{ Auth::user()->email }}</div>
                                        </div>
                                        @if(Auth::user()->isAdmin())
                                            <span class="badge bg-danger ms-auto flex-shrink-0">Admin</span>
                                        @else
                                            <span class="badge bg-success ms-auto flex-shrink-0">Member</span>
                                        @endif
                                    </div>
                                </li>
                                @if(Auth::user()->isAdmin())
                                    <li>
                                        <a class="dropdown-item pcba-user-dropdown-item text-danger fw-bold" href="{{ route('admin.dashboard') }}">
                                            <span class="pcba-dditem-icon bg-danger-subtle text-danger"><i class="bi bi-speedometer2"></i></span>
                                            Admin Dashboard
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                @endif
                                <li>
                                    <a class="dropdown-item pcba-user-dropdown-item" href="{{ route('profile.edit') }}">
                                        <span class="pcba-dditem-icon bg-primary-subtle text-primary"><i class="bi bi-person-fill-gear"></i></span>
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item pcba-user-dropdown-item" href="{{ route('cfs-passes') }}">
                                        <span class="pcba-dditem-icon bg-success-subtle text-success"><i class="bi bi-card-list"></i></span>
                                        CFS Passes
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item pcba-user-dropdown-item" href="{{ route('contacts.index') }}">
                                        <span class="pcba-dditem-icon bg-info-subtle text-info"><i class="bi bi-people-fill"></i></span>
                                        Contact Manager
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item pcba-user-dropdown-item" href="{{ route('password.change') }}">
                                        <span class="pcba-dditem-icon bg-warning-subtle text-warning"><i class="bi bi-key-fill"></i></span>
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item pcba-user-dropdown-item" href="{{ route('grievances.index') }}">
                                        <span class="pcba-dditem-icon bg-danger-subtle text-danger"><i class="bi bi-exclamation-circle-fill"></i></span>
                                        My Grievances
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item pcba-user-dropdown-item" href="{{ route('invoices.index') }}">
                                        <span class="pcba-dditem-icon bg-secondary-subtle text-secondary"><i class="bi bi-receipt-cutoff"></i></span>
                                        Receipt and Invoice
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-2"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item pcba-user-dropdown-item pcba-logout-item">
                                            <span class="pcba-dditem-icon bg-danger-subtle text-danger"><i class="bi bi-box-arrow-right"></i></span>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-pcba-primary py-2 px-3 fs-7 text-decoration-none">
                            <i class="bi bi-shield-lock-fill"></i> Member Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENT WRAPPER -->
    <main class="pcba-main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="pcba-footer" id="contact">
        <div class="container">
            <div class="row g-5">
                <!-- Col 1: Brand & Overview -->
                <div class="col-lg-4">
                    <div class="navbar-brand-wrapper mb-3 align-items-center">
                        <img src="{{ asset('images/logo-trimmed.png') }}" alt="PCBA Pipavav Logo"
                            class="footer-brand-logo">
                        <div>
                            <span class="brand-title text-white">PCBA <span>PIPAVAV</span></span>
                            <span class="brand-subtitle text-white-50">Pipavav Customs Brokers Association</span>
                        </div>
                    </div>
                    <p class="footer-brand-desc">
                        Professional association representing Customs Brokers operating at Pipavav Port, Gujarat. Established in 2014 & Member Association of the Federation of Freight Forwarders’ Associations in India (FFFAI) & FCBA.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-link" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="mailto:info@pcbapipavav.org" class="social-link" aria-label="Email"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div class="col-6 col-lg-2">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('compliance') }}"><i class="bi bi-chevron-right"></i> Regulatory Compliance</a></li>
                        <li><a href="{{ route('training') }}"><i class="bi bi-chevron-right"></i> Training & Skills</a></li>
                        <li><a href="{{ route('trade-facilitation') }}"><i class="bi bi-chevron-right"></i> Trade Facilitation</a></li>
                        <li><a href="{{ route('membership') }}"><i class="bi bi-chevron-right"></i> Membership Hub</a></li>
                        <li><a href="{{ route('membership.apply') }}"><i class="bi bi-chevron-right"></i> Membership Apply Form</a></li>
                        <li><a href="{{ route('membership.search') }}"><i class="bi bi-chevron-right"></i> Membership Search</a></li>
                        <li><a href="{{ route('associations') }}"><i class="bi bi-chevron-right"></i> Our Associations</a></li>
                        <li><a href="{{ route('gallery') }}"><i class="bi bi-chevron-right"></i> Photo Gallery</a></li>
                        <li><a href="{{ route('events') }}"><i class="bi bi-chevron-right"></i> Association Events</a></li>
                    </ul>
                </div>

                <!-- Col 3: Port & EXIM Resources -->
                <div class="col-6 col-lg-2">
                    <h5 class="footer-title">Apex & Port Links</h5>
                    <ul class="footer-links">
                        <li><a href="https://fffai.org" target="_blank" rel="noopener"><i class="bi bi-chevron-right"></i> FFFAI Apex Body</a></li>
                        <li><a href="https://icegate.gov.in" target="_blank" rel="noopener"><i class="bi bi-chevron-right"></i> ICEGATE EDI</a></li>
                        <li><a href="https://www.cbic.gov.in" target="_blank" rel="noopener"><i class="bi bi-chevron-right"></i> CBIC Portal</a></li>
                        <li><a href="https://www.apmterminals.com" target="_blank" rel="noopener"><i class="bi bi-chevron-right"></i> APM Terminals</a></li>
                        <li><a href="https://dgft.gov.in" target="_blank" rel="noopener"><i class="bi bi-chevron-right"></i> DGFT India</a></li>
                    </ul>
                </div>

                <!-- Col 4: Port Office & Contact -->
                <div class="col-lg-4">
                    <h5 class="footer-title">Association Secretariat</h5>
                    <div class="footer-contact-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Pipavav Customs Brokers Association, Port Pipavav, Post: Rampara-2, Taluka: Rajula, Dist. Amreli, Gujarat - 365560, India</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>info@pcbapipavav.org / contact@pcbapipavav.org</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Notification No. 52/2022-Customs (N.T.) • Regulation 20</span>
                    </div>
                    <div class="mt-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-light rounded-pill px-3">
                                <i class="bi bi-speedometer2 me-1"></i> Member Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                <i class="bi bi-lock-fill me-1"></i> Member Portal Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                        <p class="mb-0">
                            &copy; {{ date('Y') }} <strong>Pipavav Customs Brokers Association (PCBA)</strong>. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0 text-muted fs-8">
                            Port Pipavav, Gujarat • Affiliated with FFFAI & FCBA • Trade Facilitation & Compliance
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Custom Interaction & Animation Script -->
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('extra_js')
</body>

</html>
