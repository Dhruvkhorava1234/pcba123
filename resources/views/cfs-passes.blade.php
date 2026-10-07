@extends('layouts.app')

@section('title', 'CFS Passes | Pipavav Customs Brokers Association (PCBA)')

@section('content')
<style>
    .cfs-no-anim, .cfs-no-anim * {
        animation: none !important;
        transition: none !important;
        transform: none !important;
    }
    .status-badge-approve  { color: #16a34a; font-weight: 600; }
    .status-badge-pending  { color: #d97706; font-weight: 600; }
    .status-badge-rejected { color: #dc2626; font-weight: 600; }
</style>

<div class="bg-white min-vh-100 cfs-no-anim" style="padding-top: 135px; padding-bottom: 70px;">
    <div class="container" style="max-width: 1140px;">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Please fix the following:</div>
                <ul class="mb-0 small ps-3">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ── LIST VIEW ── --}}
        <div id="cfs-list-view" {{ session('show_form') ? 'style=display:none' : '' }}>
            <div class="row align-items-center mb-4">
                <div class="col-6">
                    <h2 class="fw-bold mb-0 text-uppercase"
                        style="font-family:'Space Grotesk',sans-serif;color:#0a2540;font-size:1.75rem;letter-spacing:.5px;">
                        CFS PASSES
                    </h2>
                </div>
                <div class="col-6 text-end">
                    <button type="button"
                        onclick="document.getElementById('cfs-list-view').style.display='none';
                                 document.getElementById('cfs-form-view').style.display='block';
                                 window.scrollTo({top:0});"
                        class="btn px-4 py-2 text-white fw-medium shadow-sm"
                        style="background-color:#0b2530;border-radius:4px;font-size:.9rem;">
                        Add
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle" style="border-collapse:separate;border-spacing:0;">
                    <thead>
                        <tr style="border-top:1px solid #e9ecef;border-bottom:1px solid #dee2e6;">
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:13%;">Application No</th>
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:28%;">Application Name</th>
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:14%;">Mobile No</th>
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:13%;">Date</th>
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:12%;">Type</th>
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:8%;">Card No</th>
                            <th class="py-3 px-2 fw-bold text-dark" style="font-size:.88rem;width:12%;">Pass Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($passes as $pass)
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td class="py-3 px-2 text-secondary" style="font-size:.88rem;">{{ $pass->application_no }}</td>
                                <td class="py-3 px-2 text-dark text-uppercase fw-semibold" style="font-size:.88rem;">{{ $pass->full_name }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size:.88rem;">{{ $pass->mobile_no }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size:.88rem;">{{ $pass->created_at->format('d-m-Y') }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size:.88rem;">{{ $pass->application_type }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size:.88rem;">{{ $pass->card_no ?? '-' }}</td>
                                <td class="py-3 px-2" style="font-size:.88rem;">
                                    @if($pass->pass_status === 'Approve')
                                        <span class="status-badge-approve">Approve</span>
                                    @elseif($pass->pass_status === 'Rejected')
                                        <span class="status-badge-rejected">Rejected</span>
                                    @else
                                        <span class="status-badge-pending">Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 px-2 text-secondary" style="font-size:.9rem;">
                                    No CFS Pass Applications found. Click <strong>Add</strong> to submit your first application.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ── ADD FORM VIEW ── --}}
        <div id="cfs-form-view" style="display:none;">
            <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                <h2 class="fw-bold mb-0 text-uppercase"
                    style="font-family:'Space Grotesk',sans-serif;color:#0a2540;font-size:1.75rem;letter-spacing:.5px;">
                    CFS PASSES
                </h2>
                <button type="button"
                    onclick="document.getElementById('cfs-form-view').style.display='none';
                             document.getElementById('cfs-list-view').style.display='block';
                             window.scrollTo({top:0});"
                    class="btn btn-outline-secondary px-3 py-2" style="font-size:.85rem;border-radius:4px;">
                    <i class="bi bi-arrow-left me-1"></i> Back to Passes
                </button>
            </div>

            <form id="cfsPassAddForm" method="POST" action="{{ route('cfs-passes.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Row 1: Names --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control py-2 px-3" name="first_name" placeholder="First Name" required value="{{ old('first_name') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Middle Name</label>
                        <input type="text" class="form-control py-2 px-3" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Last Name</label>
                        <input type="text" class="form-control py-2 px-3" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                </div>

                {{-- Row 2: Gender, DOB, Blood Group --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Gender <span class="text-danger">*</span></label>
                        <select class="form-select py-2 px-3" name="gender" required style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>Male</option>
                            <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>Female</option>
                            <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" class="form-control py-2 px-3" name="dob" required value="{{ old('dob') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Blood Group</label>
                        <select class="form-select py-2 px-3" name="blood_group" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                            <option value="">Select Blood Group</option>
                            @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                                <option value="{{ $bg }}" {{ old('blood_group')==$bg?'selected':'' }}>{{ $bg }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Row 3: Landline, Mobile, Identity Proof --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Landline No</label>
                        <input type="tel" class="form-control py-2 px-3" name="landline_no" placeholder="Landline No" value="{{ old('landline_no') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Mobile No <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control py-2 px-3" name="mobile_no" placeholder="Mobile No" required value="{{ old('mobile_no') }}" pattern="[0-9]{10}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Identity Proof</label>
                        <select class="form-select py-2 px-3" name="identity_proof" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                            @foreach(['Aadhar Card','PAN Card','Passport','Voter ID','Driving License'] as $ip)
                                <option value="{{ $ip }}" {{ old('identity_proof',$ip=='Aadhar Card'?'Aadhar Card':'')==$ip?'selected':'' }}>{{ $ip }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Row 4: Aadhar No, Aadhar File, Photo --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Aadhar Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control py-2 px-3" name="aadhar_number" placeholder="XXXX XXXX XXXX" required value="{{ old('aadhar_number') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Attach Aadhar Copy <span class="text-danger">*</span></label>
                        <input type="file" class="form-control py-1 px-2" name="aadhar_file" required accept=".pdf,.jpg,.jpeg,.png" style="border-color:#cbd5e1;border-radius:3px;font-size:.85rem;">
                        <div class="text-muted mt-1" style="font-size:.78rem;">Max size 1MB</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Photograph <span class="text-danger">*</span></label>
                        <input type="file" class="form-control py-1 px-2" name="photo_file" required accept=".jpg,.jpeg,.png" style="border-color:#cbd5e1;border-radius:3px;font-size:.85rem;">
                        <div class="text-muted mt-1" style="font-size:.78rem;">Max size 1MB</div>
                    </div>
                </div>

                {{-- Row 5: App Type, Designation --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Application Type <span class="text-danger">*</span></label>
                        <select class="form-select py-2 px-3" name="application_type" required style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                            <option value="">Select Type</option>
                            @foreach(['New','Renewal','Replacement'] as $at)
                                <option value="{{ $at }}" {{ old('application_type')==$at?'selected':'' }}>{{ $at }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Designation</label>
                        <input type="text" class="form-control py-2 px-3" name="designation" placeholder="Designation" value="{{ old('designation') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                </div>

                {{-- Row 6: Address --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Flat/Plot/Wing No</label>
                        <input type="text" class="form-control py-2 px-3" name="flat_wing" placeholder="Flat/Plot/Wing No" value="{{ old('flat_wing') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Building Name</label>
                        <input type="text" class="form-control py-2 px-3" name="building_name" placeholder="Building Name" value="{{ old('building_name') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Road Name</label>
                        <input type="text" class="form-control py-2 px-3" name="road_name" placeholder="Road Name" value="{{ old('road_name') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                </div>

                {{-- Row 7: Area, City, Pincode --}}
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Area/Locality</label>
                        <input type="text" class="form-control py-2 px-3" name="area_locality" placeholder="Area/Locality" value="{{ old('area_locality') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">City</label>
                        <input type="text" class="form-control py-2 px-3" name="city" placeholder="City" value="{{ old('city') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size:.9rem;">Pincode</label>
                        <input type="text" class="form-control py-2 px-3" name="pincode" placeholder="Pincode" pattern="[0-9]{6}" value="{{ old('pincode') }}" style="border-color:#cbd5e1;border-radius:3px;font-size:.9rem;">
                    </div>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn px-4 py-2 text-white fw-medium shadow-sm"
                        style="background-color:#0b2530;border-radius:4px;font-size:.9rem;min-width:100px;">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@if($errors->any())
<script>
    // If validation failed, show the form not the list
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('cfs-list-view').style.display = 'none';
        document.getElementById('cfs-form-view').style.display = 'block';
    });
</script>
@endif
@endsection
