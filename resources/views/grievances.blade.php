@extends('layouts.app')

@section('title', 'Grievances | Pipavav Customs Brokers Association (PCBA)')

@section('content')
<style>
    /* Clean layout styling matching the provided screenshots */
    .grievance-title {
        font-family: 'Space Grotesk', serif, sans-serif;
        font-weight: 800;
        color: #0b2530;
        letter-spacing: 0.5px;
        font-size: 1.6rem;
    }
    .council-list-group {
        border: 1px solid #e9ecef;
        border-radius: 4px;
        overflow: hidden;
    }
    .council-list-item {
        display: block;
        padding: 14px 20px;
        font-weight: 700;
        color: #0d6efd;
        text-decoration: none;
        border-bottom: 1px solid #e9ecef;
        background-color: #fff;
        font-size: 0.95rem;
        transition: background-color 0.15s ease-in-out;
    }
    .council-list-item:last-child {
        border-bottom: none;
    }
    .council-list-item:hover {
        background-color: #f8fafc;
        color: #0a58ca;
    }
    .btn-dark-navy {
        background-color: #0c2b38;
        color: #ffffff;
        font-weight: 600;
        border-radius: 4px;
        font-size: 0.9rem;
        border: none;
    }
    .btn-dark-navy:hover {
        background-color: #071a22;
        color: #ffffff;
    }
    .btn-outline-back {
        border: 1px solid #ced4da;
        color: #0d6efd;
        font-weight: 600;
        border-radius: 4px;
        padding: 5px 16px;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-block;
        background-color: #fff;
    }
    .btn-outline-back:hover {
        background-color: #f8f9fa;
        color: #0a58ca;
        border-color: #b0b8c0;
    }
    .filter-label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #495057;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    .form-custom-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 7px 12px;
        font-size: 0.9rem;
        color: #212529;
    }
    .form-custom-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        outline: none;
    }
</style>

<div class="bg-white min-vh-100" style="padding-top: 135px; padding-bottom: 70px;">
    <div class="container" style="max-width: 1140px;">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Please check the following issues:</div>
                <ul class="mb-0 small ps-3">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(!$selectedCouncil)
            <!-- SCREEN 1: GRIEVANCES COUNCIL LIST -->
            <div class="mb-4">
                <h2 class="grievance-title text-uppercase mb-4">GRIEVANCES</h2>

                <div class="council-list-group shadow-sm">
                    @foreach($councils as $council)
                        <a href="{{ route('grievances.index', ['council' => $council]) }}" class="council-list-item">
                            {{ $council }}
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <!-- SCREEN 2: GRIEVANCES COUNCIL DETAIL VIEW (Matches 2nd image) -->
            <div class="mb-4">
                <h2 class="grievance-title text-uppercase mb-3">GRIEVANCES</h2>

                <div class="mb-4">
                    <a href="{{ route('grievances.index') }}" class="btn-outline-back">
                        Go Back
                    </a>
                </div>

                <!-- Search and Filters Section -->
                <form method="GET" action="{{ route('grievances.index') }}" class="mb-4">
                    <input type="hidden" name="council" value="{{ $selectedCouncil }}">
                    
                    <div class="row g-3 align-items-end">
                        <div class="col-12 col-md-4 col-lg-3">
                            <label class="filter-label d-block">SUBJECT/ ANSWER</label>
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control form-custom-control" placeholder="">
                        </div>

                        <div class="col-12 col-md-3 col-lg-3">
                            <label class="filter-label d-block">Council</label>
                            <input type="text" class="form-control form-custom-control bg-light" value="{{ $selectedCouncil }}" readonly>
                        </div>

                        <div class="col-12 col-md-3 col-lg-2">
                            <label class="filter-label d-block">Status</label>
                            <select name="status" class="form-select form-custom-control">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>All Status</option>
                                <option value="Answered" {{ request('status') == 'Answered' ? 'selected' : '' }}>Answered</option>
                                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-2 col-lg-2 d-flex flex-column gap-2 ms-auto">
                            <button type="submit" class="btn btn-dark-navy w-100 py-2">
                                Submit
                            </button>
                            <button type="button" class="btn btn-dark-navy w-100 py-2" data-bs-toggle="modal" data-bs-target="#addGrievanceModal">
                                Add
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Grievances Table -->
                <div class="table-responsive mt-4">
                    <table class="table align-middle" style="border-collapse: separate; border-spacing: 0;">
                        <thead>
                            <tr style="border-bottom: 1px solid #dee2e6;">
                                <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.9rem; width: 15%;">Date</th>
                                <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.9rem; width: 25%;">Council</th>
                                <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.9rem; width: 30%;">Query</th>
                                <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.9rem; width: 20%;">Member Name</th>
                                <th scope="col" class="py-3 px-2 fw-bold text-dark text-end" style="font-size: 0.9rem; width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($grievances as $item)
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="py-3 px-2 text-dark fw-medium" style="font-size: 0.88rem;">
                                        {{ $item->council }}
                                    </td>
                                    <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">
                                        @if($item->subject)
                                            <div class="fw-semibold text-dark">{{ $item->subject }}</div>
                                        @endif
                                        <div>{{ $item->query }}</div>
                                        @if($item->answer)
                                            <div class="mt-1 p-2 bg-light rounded text-success small border-start border-3 border-success">
                                                <strong>Answer:</strong> {{ $item->answer }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">
                                        {{ $item->member_name ?? ($item->user ? $item->user->name : 'N/A') }}
                                    </td>
                                    <td class="py-3 px-2 text-end" style="font-size: 0.88rem;">
                                        <div class="d-inline-flex align-items-center gap-1">
                                            @if(Auth::user()->isAdmin())
                                                <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2" data-bs-toggle="modal" data-bs-target="#answerModal{{ $item->id }}" title="Reply / Answer">
                                                    <i class="bi bi-chat-left-text"></i>
                                                </button>
                                            @endif
                                            <form method="POST" action="{{ route('grievances.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this grievance?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                        @if(Auth::user()->isAdmin())
                                            <!-- Answer Modal for Admin -->
                                            <div class="modal fade text-start" id="answerModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('grievances.answer', $item->id) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold">Answer Member Grievance</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-2 text-muted small"><strong>Member:</strong> {{ $item->member_name }}</div>
                                                                <div class="mb-3 p-2 bg-light rounded text-dark small">
                                                                    <strong>Query:</strong> {{ $item->query }}
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label class="form-label small fw-semibold text-uppercase">Answer / Resolution</label>
                                                                    <textarea name="answer" class="form-control" rows="4" required placeholder="Type answer for this query...">{{ $item->answer }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-dark-navy btn-sm px-4">Post Answer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 px-2 text-secondary" style="font-size: 0.9rem;">
                                        No Questions Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Add Grievance Modal -->
            <div class="modal fade" id="addGrievanceModal" tabindex="-1" aria-labelledby="addGrievanceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('grievances.store') }}">
                            @csrf
                            <input type="hidden" name="council" value="{{ $selectedCouncil }}">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="addGrievanceModalLabel">Post a Grievance / Query</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-muted text-uppercase">Council</label>
                                    <input type="text" class="form-control bg-light" value="{{ $selectedCouncil }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-muted text-uppercase">Subject / Topic</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Brief subject of grievance">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-muted text-uppercase">Query / Issue <span class="text-danger">*</span></label>
                                    <textarea name="query" rows="4" class="form-control" placeholder="Describe your grievance or question here..." required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-dark-navy btn-sm px-4">Submit Query</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
