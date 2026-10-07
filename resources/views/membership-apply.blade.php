@extends('layouts.app')

@section('title', 'Membership Apply | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Apply for official membership with Pipavav Customs Brokers Association. Comprehensive statutory enrollment form.')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <a href="{{ route('membership') }}">Membership</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Membership Apply</span>
        </div>
        <div class="badge-tagline">
            Official Application • Regulation 20 CBLR • Statutory Enrollment
        </div>
        <h1 class="page-hero-title">Membership Application Portal</h1>
        <p class="page-hero-subtitle">
            Complete the official registration form to apply for Pipavav Customs Brokers Association membership. Please provide accurate firm, license, and branch details.
        </p>
    </div>
</section>

<!-- MEMBERSHIP APPLY FORM SECTION -->
<section class="py-5 bg-light" id="apply-form-section">
    <div class="container py-3">
        <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 border" style="border-color: #e2d9cc !important;">
            
            <div class="border-bottom pb-4 mb-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                        <span class="badge text-uppercase px-3 py-1 fw-bold fs-8 mb-2" style="background: rgba(242, 92, 59, 0.12); color: var(--color-accent-orange); border: 1px solid rgba(242, 92, 59, 0.3);">
                            Online Registration Form
                        </span>
                        <h2 class="h3 fw-bold text-uppercase mb-1" style="color: #0b1a24; letter-spacing: 0.03em;">
                            MEMBERSHIP APPLY
                        </h2>
                        <p class="text-secondary small mb-0">Fields marked with an asterisk (<span class="text-danger">*</span>) are mandatory.</p>
                    </div>
                    <div class="text-end d-none d-md-block">
                        <span class="badge bg-dark px-3 py-2 text-uppercase fs-8">
                            <i class="bi bi-shield-check text-warning me-1"></i> Secure Form
                        </span>
                    </div>
                </div>
            </div>

            <form id="membershipApplyForm" onsubmit="event.preventDefault(); alert('Your Membership Application has been submitted successfully! The PCBA Secretariat will review your details and contact you for verification and payment.');">
                
                <!-- 1. Office Type -->
                <div class="mb-4 p-3 rounded-3" style="background: #fdfbf7; border: 1px solid #e7dfd5;">
                    <label class="form-label fw-bold text-dark mb-2">Office Type <span class="text-danger">*</span></label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="office_type" id="office_main" value="Main Office" checked required>
                            <label class="form-check-label fw-semibold text-secondary" for="office_main">
                                Main Office
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="office_type" id="office_branch" value="Branch Office" required>
                            <label class="form-check-label fw-semibold text-secondary" for="office_branch">
                                Branch Office
                            </label>
                        </div>
                    </div>
                </div>

                <!-- 2. Row 1: Company Name, Company Type, Authorized Person -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Company Type <span class="text-danger">*</span></label>
                        <select class="form-select" name="company_type" required>
                            <option value="">Select Company Type</option>
                            <option value="Proprietorship">Proprietorship</option>
                            <option value="Partnership Firm">Partnership Firm</option>
                            <option value="Private Limited Company">Private Limited Company</option>
                            <option value="Public Limited Company">Public Limited Company</option>
                            <option value="LLP">Limited Liability Partnership (LLP)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Authorized Person <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="authorized_person" placeholder="Full Name" required>
                    </div>
                </div>

                <!-- 3. Row 2: Authorized Person Designation, Address, City -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Authorized Person Designation <span class="text-danger">*</span></label>
                        <select class="form-select" name="authorized_designation" required>
                            <option value="">Select Designation</option>
                            <option value="Proprietor">Proprietor</option>
                            <option value="Managing Director">Managing Director</option>
                            <option value="Director">Director</option>
                            <option value="Partner">Partner</option>
                            <option value="F-Card Holder">F-Card Holder</option>
                            <option value="G-Card Holder">G-Card Holder</option>
                            <option value="Authorized Signatory">Authorized Signatory</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="address" rows="2" placeholder="Registered office address" required></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">City <span class="text-danger">*</span></label>
                        <select class="form-select" name="city" required>
                            <option value="">Select City</option>
                            <option value="Pipavav">Pipavav</option>
                            <option value="Rajula">Rajula</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Gandhidham">Gandhidham</option>
                            <option value="Kandla">Kandla</option>
                            <option value="Mundra">Mundra</option>
                            <option value="Surat">Surat</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- 4. Correspondence Address Toggle -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sameAddressCheck" onchange="toggleCorrespondenceAddress(this)">
                            <label class="form-check-label small fw-semibold text-secondary" for="sameAddressCheck">
                                Is correspondence address the same as registered address?
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Correspondence Address</label>
                        <textarea class="form-control" id="correspondence_address" name="correspondence_address" rows="2" placeholder="Correspondence office address"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Correspondence City</label>
                        <select class="form-select" id="correspondence_city" name="correspondence_city">
                            <option value="">Select City</option>
                            <option value="Pipavav">Pipavav</option>
                            <option value="Rajula">Rajula</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Gandhidham">Gandhidham</option>
                            <option value="Kandla">Kandla</option>
                            <option value="Mundra">Mundra</option>
                            <option value="Surat">Surat</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- 5. Row: Email ID, Alt Email Id 1, Alt Email Id 2 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Email ID <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="primary@company.com" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Alt Email Id 1</label>
                        <input type="email" class="form-control" name="alt_email_1" placeholder="alt1@company.com">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Alt Email Id 2</label>
                        <input type="email" class="form-control" name="alt_email_2" placeholder="alt2@company.com">
                    </div>
                </div>

                <!-- 6. Row: Mobile No., Alt Mobile No 1, Alt Mobile No 2 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Mobile No. <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" name="mobile" placeholder="10-digit mobile number" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Alt Mobile No 1</label>
                        <input type="tel" class="form-control" name="alt_mobile_1" placeholder="Alternate mobile 1">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Alt Mobile No 2</label>
                        <input type="tel" class="form-control" name="alt_mobile_2" placeholder="Alternate mobile 2">
                    </div>
                </div>

                <!-- 7. Row: Tel No, Alt Tel No 1, Alt Tel No 2 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Tel No <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" name="tel_no" placeholder="Landline / Telephone" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Alt Tel No 1</label>
                        <input type="tel" class="form-control" name="alt_tel_1" placeholder="Alternate Tel 1">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Alt Tel No 2</label>
                        <input type="tel" class="form-control" name="alt_tel_2" placeholder="Alternate Tel 2">
                    </div>
                </div>

                <!-- 8. Row: Website URL, Employee with pass, Employee without pass -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Website URL</label>
                        <input type="url" class="form-control" name="website_url" placeholder="https://example.com">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Employee with pass</label>
                        <input type="number" min="0" class="form-control" name="emp_with_pass" placeholder="Count with port pass">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Employee without pass</label>
                        <input type="number" min="0" class="form-control" name="emp_without_pass" placeholder="Count without pass">
                    </div>
                </div>

                <!-- 9. Row: Total Emp, Old CHA No, Old CHA Date -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Total Emp</label>
                        <input type="number" min="1" class="form-control" name="total_emp" placeholder="Total employees">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Old CHA No</label>
                        <input type="text" class="form-control" name="old_cha_no" placeholder="11/...">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Old CHA Date</label>
                        <input type="date" class="form-control" name="old_cha_date">
                    </div>
                </div>

                <!-- 10. Row: New CHA No, New CHA Date -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">New CHA No <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="new_cha_no" placeholder="Enter New CHA No" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">New CHA Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="new_cha_date" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">GST No <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="gst_no" placeholder="15-digit GSTIN" required>
                    </div>
                </div>

                <!-- 11. Custom House (Multi-select Checkboxes) -->
                <div class="mb-4 p-3 rounded-3" style="background: #fdfbf7; border: 1px solid #e7dfd5;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label class="form-label fw-bold text-dark mb-0">
                            Custom House <span class="text-danger">*</span>
                        </label>
                        <span class="text-muted small">Select all stations where you operate</span>
                    </div>
                    <div class="row g-2">
                        @php
                            $customHouses = [
                                'Ahmedabad', 'Aurangabad', 'Bangalore', 'Chennai',
                                'Cochin', 'Coimbatore', 'Delhi', 'GANDHIDHAM',
                                'Goa', 'Hapur', 'Hyderabad', 'Indore',
                                'Jamnagar', 'Kakinada', 'Kandla', 'Kanpur',
                                'KOCHI', 'Kolkata', 'LUCKNOW', 'Ludhiana',
                                'Mangalore', 'MUDRA', 'Mumbai', 'NAGPUR',
                                'Nagpur', 'Nashik', 'Noida', 'Patna',
                                'Pune', 'Rajasthan', 'SURAT', 'Thiruvananthapuram',
                                'Tuticorin', 'Visakhapatnam', 'Pipavav'
                            ];
                        @endphp
                        @foreach($customHouses as $index => $house)
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="custom_houses[]" value="{{ $house }}" id="ch_{{ $index }}" {{ $house === 'Pipavav' ? 'checked' : '' }}>
                                    <label class="form-check-label small text-secondary" for="ch_{{ $index }}">
                                        {{ $house }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 12. Row: Parent Custom House, Member of Association, Agent No -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Parent Custom House <span class="text-danger">*</span></label>
                        <select class="form-select" name="parent_custom_house" required>
                            <option value="">Select Custom House</option>
                            <option value="Pipavav" selected>Pipavav Customs House</option>
                            <option value="Jamnagar">Jamnagar Customs</option>
                            <option value="Kandla">Kandla Customs</option>
                            <option value="Mundra">Mundra Customs</option>
                            <option value="Ahmedabad">Ahmedabad Customs</option>
                            <option value="Mumbai">Mumbai (JNPT / NCH)</option>
                            <option value="Delhi">Delhi (ICD Tughlakabad / PPG)</option>
                            <option value="Chennai">Chennai Customs</option>
                            <option value="Kolkata">Kolkata Customs</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Member of Association</label>
                        <select class="form-select" name="member_of_association">
                            <option value="">Select Member of Association</option>
                            <option value="PCBA" selected>PCBA (Pipavav Customs Brokers Association)</option>
                            <option value="FFFAI">FFFAI</option>
                            <option value="FCBA">FCBA</option>
                            <option value="BCHAA">BCHAA (Brihanmumbai)</option>
                            <option value="KCHAA">KCHAA (Kandla)</option>
                            <option value="MCHAA">MCHAA (Mundra)</option>
                            <option value="ACHAA">ACHAA (Ahmedabad)</option>
                            <option value="Other">Other Recognized Association</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Agent No</label>
                        <input type="text" class="form-control" name="agent_no" placeholder="Agent Registration Number">
                    </div>
                </div>

                <!-- 13. Row: Username, Password, Agent Service Type -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Create a strong password" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-dark">Agent Service Type</label>
                        <select class="form-select" name="agent_service_type">
                            <option value="">Select Agent Service</option>
                            <option value="Customs Brokerage / Clearance">Customs Brokerage / Clearance</option>
                            <option value="Freight Forwarding">Freight Forwarding</option>
                            <option value="Multimodal Transportation">Multimodal Transportation</option>
                            <option value="Warehousing & Logistics">Warehousing & Logistics</option>
                            <option value="Comprehensive EXIM Solutions">Comprehensive EXIM Solutions</option>
                        </select>
                    </div>
                </div>

                <!-- 14. Company Logo File Upload -->
                <div class="row g-3 mb-4">
                    <div class="col-md-12">
                        <label class="form-label small fw-bold text-dark">Company Logo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="company_logo" accept="image/*" required>
                        <div class="form-text small">The file size must not exceed 1MB (Accepted: PNG, JPG, JPEG)</div>
                    </div>
                </div>

                <!-- 14-B. BRANCH OFFICE SPECIFIC PARTICULARS (Appears when Branch Office is selected) -->
                <div id="branchOfficeFields" class="p-3 mb-4 rounded-3 border" style="display: none; background: #fdfbf7; border-color: #e2d9cc !important;">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge bg-warning text-dark text-uppercase px-2 py-1 fs-8 fw-bold">Branch Office Details</span>
                        <h6 class="fw-bold text-dark mb-0">Parent & Branch Office Particulars</h6>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Regd Office Pin / Zip Code</label>
                            <input type="text" class="form-control" name="regd_pin_code" placeholder="Pin / Zip code">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Belongs to city</label>
                            <select class="form-select" name="belongs_to_city">
                                <option value="">Select City</option>
                                <option value="Pipavav">Pipavav</option>
                                <option value="Rajula">Rajula</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Gandhidham">Gandhidham</option>
                                <option value="Kandla">Kandla</option>
                                <option value="Mundra">Mundra</option>
                                <option value="Surat">Surat</option>
                                <option value="Vadodara">Vadodara</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Parent Main Custom House</label>
                            <select class="form-select" name="parent_main_custom_house">
                                <option value="">Select Main Custom House</option>
                                <option value="Pipavav">Pipavav</option>
                                <option value="Jamnagar">Jamnagar</option>
                                <option value="Kandla">Kandla</option>
                                <option value="Mundra">Mundra</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Parent Main Type</label>
                            <input type="text" class="form-control" name="parent_main_type" placeholder="Parent Main Type">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Main Contact Details</label>
                            <input type="text" class="form-control" name="main_contact_details" placeholder="Contact Person / Department">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Main Contact Mobile</label>
                            <input type="tel" class="form-control" name="main_contact_mobile" placeholder="Mobile Number">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Main Contact Email ID</label>
                            <input type="email" class="form-control" name="main_contact_email" placeholder="email@company.com">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Main Contact Address</label>
                            <textarea class="form-control" name="main_contact_address" rows="1" placeholder="Address"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Parent City</label>
                            <select class="form-select" name="parent_city">
                                <option value="">Select City</option>
                                <option value="Pipavav">Pipavav</option>
                                <option value="Rajula">Rajula</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Gandhidham">Gandhidham</option>
                                <option value="Kandla">Kandla</option>
                                <option value="Mundra">Mundra</option>
                                <option value="Surat">Surat</option>
                                <option value="Vadodara">Vadodara</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Zip Code</label>
                            <input type="text" class="form-control" name="branch_zip_code" placeholder="Zip code">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Tel No</label>
                            <input type="tel" class="form-control" name="branch_tel_no" placeholder="Telephone">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Alt Tel No 1</label>
                            <input type="tel" class="form-control" name="branch_alt_tel" placeholder="Alt Telephone">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Mobile No</label>
                            <input type="tel" class="form-control" name="branch_mobile_no" placeholder="Mobile Number">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Alt Mobile No 1</label>
                            <input type="tel" class="form-control" name="branch_alt_mobile" placeholder="Alt Mobile Number">
                        </div>
                    </div>
                </div>

                <!-- 14-C. DOCUMENT UPLOAD SECTION (MATCHING SCREENSHOT WITH DYNAMIC TOGGLE) -->
                <div id="documentUploadsContainer" class="p-3 mb-4 rounded-3 border bg-white" style="border-color: #e2d9cc !important;">
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-file-earmark-arrow-up text-danger fs-5"></i>
                            <h6 class="fw-bold text-dark mb-0">Required Document Attachments</h6>
                        </div>
                        <span class="badge bg-secondary text-uppercase px-2 py-1 fs-8">Max 1MB per file</span>
                    </div>

                    <!-- Common Documents (Always Uploaded) -->
                    <div class="row g-3">
                        <!-- 1. License Copy -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-dark mb-1">Please Upload Licence copy <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="licence_copy" required>
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 2. Authorized Person Photo -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-dark mb-1">Please Upload Authorised Person Photo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="authorised_person_photo" accept="image/*" required>
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 3. Another Govt of license exam -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-dark mb-1">Please Upload Another Govt of license exam <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="another_govt_licence" required>
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 4. Pan card -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-dark mb-1">Please Upload Pan card <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="pan_card_copy" required>
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 5. GST Copy -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-dark mb-1">Please Upload GST Copy <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="gst_copy" required>
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 6. F Card Copy -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-dark mb-1">Please Upload F Card Copy <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="f_card_copy" required>
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 7. Endorsement letter (Branch Office Specific or highlighted) -->
                        <div class="col-md-6 mb-2 branch-specific-doc" id="endorsementDocField">
                            <label class="form-label small fw-bold text-dark mb-1">
                                Please Upload Endorsement letter <span class="text-danger branch-doc-required">*</span>
                            </label>
                            <input type="file" class="form-control" name="endorsement_letter" id="endorsementInput">
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>

                        <!-- 8. Local Address Proof (Branch Office Specific or highlighted) -->
                        <div class="col-md-6 mb-2 branch-specific-doc" id="localAddressDocField">
                            <label class="form-label small fw-bold text-dark mb-1">
                                Please Upload Local Address Proof <span class="text-danger branch-doc-required">*</span>
                            </label>
                            <input type="file" class="form-control" name="local_address_proof" id="localAddressInput">
                            <div class="text-muted" style="font-size: 0.74rem;">The file size must not exceed 1MB</div>
                        </div>
                    </div>
                </div>

                <!-- 14-D. Accredited Membership -->
                <div class="row g-3 mb-4">
                    <div class="col-md-12">
                        <label class="form-label small fw-bold text-dark d-block">Is Accredited Membership required? <span class="text-danger">*</span></label>
                        <div class="d-flex gap-4 pt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accredited_required" id="acc_no" value="No" checked>
                                <label class="form-check-label small fw-semibold text-secondary" for="acc_no">No</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accredited_required" id="acc_yes" value="Yes">
                                <label class="form-check-label small fw-semibold text-secondary" for="acc_yes">Yes</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 15. Declarations & Consents -->
                <div class="p-3 rounded-3 mb-4" style="background: #fdfbf7; border: 1px solid #e7dfd5;">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="termsCheck" required>
                        <label class="form-check-label small text-dark" for="termsCheck">
                            I agree to PIPAVAV CUSTOMS BROKERS ASSOCIATION Terms & Conditions and Constitution. <span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="consentCheck" required>
                        <label class="form-check-label small text-dark" for="consentCheck">
                            I have no objection to receive any SMS / email / WhatsApp circulars from the association for official information purpose. <span class="text-danger">*</span>
                        </label>
                    </div>

                    <!-- Simulated ReCAPTCHA Box (Matches Reference) -->
                    <div class="p-3 bg-white rounded border d-inline-flex align-items-center gap-3 shadow-sm" style="border-color: #d1d5db; min-width: 280px;">
                        <input class="form-check-input mt-0" type="checkbox" id="captchaCheck" style="width: 24px; height: 24px;" required>
                        <label class="form-check-label small fw-semibold text-secondary mb-0" for="captchaCheck">
                            I'm not a robot
                        </label>
                        <div class="ms-auto text-end" style="line-height: 1;">
                            <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" style="height: 24px; opacity: 0.7;">
                            <div style="font-size: 8px; color: #94a3b8;">reCAPTCHA</div>
                        </div>
                    </div>
                </div>

                <!-- 16. Continue to Payment Button -->
                <div>
                    <button type="submit" class="btn w-100 py-3 fw-bold text-uppercase fs-6 text-white rounded-3 shadow-sm" style="background: #091724; border: 1px solid #091724; letter-spacing: 0.05em; transition: all 0.25s ease;" onmouseover="this.style.background='var(--color-accent-orange)'; this.style.borderColor='var(--color-accent-orange)';" onmouseout="this.style.background='#091724'; this.style.borderColor='#091724';">
                        Continue to Payment <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection

@section('extra_js')
<script>
    function toggleCorrespondenceAddress(checkbox) {
        const address = document.querySelector('textarea[name="address"]').value;
        const city = document.querySelector('select[name="city"]').value;
        const corrAddress = document.getElementById('correspondence_address');
        const corrCity = document.getElementById('correspondence_city');

        if (checkbox.checked) {
            corrAddress.value = address;
            corrCity.value = city;
        } else {
            corrAddress.value = '';
            corrCity.value = '';
        }
    }

    function handleOfficeTypeChange() {
        const isBranch = document.getElementById('office_branch').checked;
        const branchFields = document.getElementById('branchOfficeFields');
        const endorsementField = document.getElementById('endorsementDocField');
        const localAddressField = document.getElementById('localAddressDocField');
        const endorsementInput = document.getElementById('endorsementInput');
        const localAddressInput = document.getElementById('localAddressInput');

        if (isBranch) {
            // Show Branch Office Particulars
            if (branchFields) branchFields.style.display = 'block';
            
            // Show / Require Branch-specific uploads (Endorsement letter & Local address proof)
            if (endorsementField) endorsementField.style.display = 'block';
            if (localAddressField) localAddressField.style.display = 'block';
            if (endorsementInput) endorsementInput.required = true;
            if (localAddressInput) localAddressInput.required = true;
        } else {
            // Hide Branch Office Particulars for Main Office
            if (branchFields) branchFields.style.display = 'none';
            
            // Optional / hidden for Main Office
            if (endorsementField) endorsementField.style.display = 'none';
            if (localAddressField) localAddressField.style.display = 'none';
            if (endorsementInput) endorsementInput.required = false;
            if (localAddressInput) localAddressInput.required = false;
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const officeRadios = document.querySelectorAll('input[name="office_type"]');
        officeRadios.forEach(radio => {
            radio.addEventListener('change', handleOfficeTypeChange);
        });

        // Initial setup on load
        handleOfficeTypeChange();
    });
</script>
@endsection
