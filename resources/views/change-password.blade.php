@extends('layouts.app')

@section('title', 'Change Password | Pipavav Customs Brokers Association (PCBA)')

@section('content')
<style>
    .cp-no-anim,
    .cp-no-anim * {
        animation: none !important;
        transition: none !important;
        transform: none !important;
    }

    .cp-input {
        border: 1px solid #cbd5e1;
        border-radius: 2px;
        padding: 0.65rem 0.9rem;
        font-size: 0.95rem;
        color: #334155;
        background-color: #ffffff;
        box-shadow: none !important;
    }

    .cp-input:focus {
        border-color: #173844;
        outline: none;
    }

    .cp-input::placeholder {
        color: #64748b;
        font-size: 0.95rem;
    }

    .btn-cp-submit {
        background-color: #173844;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 0.55rem 1.8rem;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        min-width: 110px;
    }

    .btn-cp-back {
        background-color: #173844;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 0.55rem 1.8rem;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        min-width: 110px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-cp-submit:hover,
    .btn-cp-back:hover {
        background-color: #0f252d;
        color: #ffffff;
    }
</style>

<div class="bg-white min-vh-100 cp-no-anim d-flex flex-column align-items-center" style="padding-top: 150px; padding-bottom: 90px;">
    <div class="container" style="max-width: 580px;">

        <!-- CHANGE PASSWORD TITLE (Exact Match with Reference) -->
        <h2 class="text-center fw-bold mb-4 text-uppercase" style="font-family: 'Space Grotesk', serif, sans-serif; color: #0a2540; font-size: 1.85rem; letter-spacing: 0.5px;">
            CHANGE PASSWORD
        </h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4 text-center" role="alert">
                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Please check:</div>
                <ul class="mb-0 small ps-3">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('password.change.update') }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div class="mb-3">
                <input type="password" 
                       name="current_password" 
                       id="current_password" 
                       class="form-control cp-input w-100" 
                       placeholder="Current Password" 
                       required 
                       autocomplete="current-password">
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <input type="password" 
                       name="password" 
                       id="password" 
                       class="form-control cp-input w-100" 
                       placeholder="New Password" 
                       required 
                       autocomplete="new-password">
            </div>

            <!-- Confirm New Password -->
            <div class="mb-4">
                <input type="password" 
                       name="password_confirmation" 
                       id="password_confirmation" 
                       class="form-control cp-input w-100" 
                       placeholder="Confirm New Password" 
                       required 
                       autocomplete="new-password">
            </div>

            <!-- SUBMIT & BACK Buttons (Centered side by side) -->
            <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                <button type="submit" class="btn btn-cp-submit shadow-sm">
                    SUBMIT
                </button>
                <a href="{{ url()->previous() ?: route('cfs-passes') }}" class="btn btn-cp-back shadow-sm">
                    BACK
                </a>
            </div>

        </form>

    </div>
</div>
@endsection
