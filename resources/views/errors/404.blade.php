@extends('layouts.app')

@section('title', '404 - Page Not Found | Pipavav Customs Brokers Association')
@section('meta_description', 'The page you are looking for at Pipavav Customs Brokers Association could not be found or has moved.')

@section('extra_css')
<style>
    .error-page-wrapper {
        min-height: 72vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at 50% 20%, rgba(14, 165, 233, 0.08) 0%, rgba(11, 37, 48, 0.02) 60%, transparent 100%);
        padding: 5rem 1rem;
        position: relative;
        overflow: hidden;
    }

    .error-card {
        background: #ffffff;
        border: 1px solid rgba(14, 165, 233, 0.2);
        box-shadow: 0 20px 45px -10px rgba(11, 37, 48, 0.12), 0 0 0 1px rgba(15, 23, 42, 0.03);
        border-radius: 1.5rem;
        padding: 3.5rem 2.5rem;
        max-width: 680px;
        width: 100%;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .error-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.4rem 1rem;
        border-radius: 9999px;
        border: 1px solid rgba(239, 68, 68, 0.2);
        margin-bottom: 1.5rem;
    }

    .error-num {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(5rem, 12vw, 7.5rem);
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.04em;
        background: linear-gradient(135deg, #0b2530 0%, #0284c7 65%, #f59e0b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.75rem;
    }

    .error-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(1.4rem, 3vw, 1.85rem);
        font-weight: 700;
        color: #0b2530;
        margin-bottom: 1rem;
    }

    .error-desc {
        color: #64748b;
        font-size: 1.05rem;
        line-height: 1.6;
        max-width: 520px;
        margin: 0 auto 2rem;
    }

    .quick-links-pill {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        padding: 1.25rem;
        margin-bottom: 2rem;
    }

    .quick-links-pill h6 {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #94a3b8;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .quick-nav-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.85rem;
        font-weight: 600;
        color: #0b2530;
        background: #ffffff;
        padding: 0.4rem 0.85rem;
        border-radius: 0.5rem;
        border: 1px solid #e2e8f0;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .quick-nav-btn:hover {
        background: #0b2530;
        color: #ffffff;
        border-color: #0b2530;
        transform: translateY(-2px);
    }

    .compass-icon-wrapper {
        width: 76px;
        height: 76px;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.12), rgba(245, 158, 11, 0.12));
        border-radius: 50%;
        color: #0284c7;
        font-size: 2.25rem;
        animation: subtlePulse 3s ease-in-out infinite;
    }

    @keyframes subtlePulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(14, 165, 233, 0.2);
        }
        50% {
            transform: scale(1.04);
            box-shadow: 0 0 0 12px rgba(14, 165, 233, 0);
        }
    }
</style>
@endsection

@section('content')
<div class="error-page-wrapper">
    <div class="container d-flex justify-content-center">
        <div class="error-card">
            
            <div class="compass-icon-wrapper shadow-sm">
                <i class="bi bi-compass"></i>
            </div>

            <div class="error-badge">
                <i class="bi bi-exclamation-triangle-fill"></i> Lost Course
            </div>

            <h1 class="error-num">404</h1>
            <h2 class="error-title">Vessel Off Coordinates: Page Not Found</h2>
            <p class="error-desc">
                The URL or navigation coordinates you requested do not exist, may have sailed away, or the address was mistyped.
            </p>

            <!-- Suggested Destinations -->
            <div class="quick-links-pill">
                <h6>Popular Port Destinations</h6>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('home') }}" class="quick-nav-btn">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                    <a href="{{ route('about') }}" class="quick-nav-btn">
                        <i class="bi bi-info-circle"></i> About Us
                    </a>
                    <a href="{{ route('gallery') }}" class="quick-nav-btn">
                        <i class="bi bi-images"></i> Gallery
                    </a>
                    <a href="{{ route('events') }}" class="quick-nav-btn">
                        <i class="bi bi-calendar-event"></i> Events
                    </a>
                    <a href="{{ route('membership.search') }}" class="quick-nav-btn">
                        <i class="bi bi-people"></i> Member Directory
                    </a>
                    <a href="{{ route('contact') }}" class="quick-nav-btn">
                        <i class="bi bi-envelope"></i> Contact
                    </a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button type="button" onclick="history.back()" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-semibold">
                    <i class="bi bi-arrow-left me-1"></i> Return Back
                </button>
                <a href="{{ route('home') }}" class="btn-pcba-primary py-2 px-4 rounded-pill text-decoration-none fw-semibold">
                    <i class="bi bi-anchor me-1"></i> Back to Port (Home)
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
