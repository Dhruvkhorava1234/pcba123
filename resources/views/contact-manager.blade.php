@extends('layouts.app')

@section('title', 'Contact Manager | Pipavav Customs Brokers Association (PCBA)')

@section('content')
<style>
    /* Clean layout without bouncy mouse animations */
    .cm-no-anim,
    .cm-no-anim * {
        animation: none !important;
        transition: none !important;
        transform: none !important;
    }
</style>

<div class="bg-white min-vh-100 cm-no-anim" style="padding-top: 135px; padding-bottom: 70px;">
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

        <!-- View 1: Contact List View -->
        <div id="contact-list-view">
            <div class="row align-items-center mb-4">
                <div class="col-6">
                    <h2 class="fw-bold mb-0 text-uppercase" style="font-family: 'Space Grotesk', serif, sans-serif; color: #0a2540; font-size: 1.75rem; letter-spacing: 0.5px;">
                        CONTACT MANAGER
                    </h2>
                </div>
                <div class="col-6 text-end">
                    <button type="button" id="btn-show-add-contact" onclick="document.getElementById('contact-list-view').style.display='none'; document.getElementById('contact-form-view').style.display='block'; window.scrollTo({top:0, behavior:'smooth'});" class="btn px-4 py-2 text-white fw-medium shadow-sm" style="background-color: #526b74; border-radius: 4px; font-size: 0.9rem; min-width: 95px;">
                        Add
                    </button>
                </div>
            </div>

            <!-- Table of Contacts -->
            <div class="table-responsive">
                <table class="table align-middle" id="contactTable" style="border-collapse: separate; border-spacing: 0;">
                    <thead>
                        <tr class="text-dark" style="border-top: 1px solid #e9ecef; border-bottom: 1px solid #dee2e6;">
                            <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.88rem; width: 5%;">#</th>
                            <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.88rem; width: 22%;">Contact Name</th>
                            <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.88rem; width: 16%;">Company / Firm</th>
                            <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.88rem; width: 15%;">Designation</th>
                            <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.88rem; width: 14%;">Mobile No</th>
                            <th scope="col" class="py-3 px-2 fw-bold text-dark" style="font-size: 0.88rem; width: 16%;">Email ID</th>
                            <th scope="col" class="py-3 px-2 fw-bold text-dark text-end" style="font-size: 0.88rem; width: 12%;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="contactTbody">
                        @forelse($contacts as $index => $contact)
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">{{ $index + 1 }}</td>
                                <td class="py-3 px-2 text-dark text-uppercase fw-semibold" style="font-size: 0.88rem;">{{ $contact->name }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">{{ $contact->company_name ?: '-' }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">{{ $contact->designation ?: '-' }}</td>
                                <td class="py-3 px-2 text-secondary" style="font-size: 0.88rem;">{{ $contact->mobile_no }}</td>
                                <td class="py-3 px-2 text-primary" style="font-size: 0.88rem;">{{ $contact->email ?: '-' }}</td>
                                <td class="py-3 px-2 text-end">
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2.5" style="font-size: 0.78rem;">
                                            <i class="bi bi-trash3 me-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-people fs-2 d-block mb-2 text-secondary"></i>
                                    No contacts saved yet. Click the <strong>"Add"</strong> button above to add your first contact.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- View 2: Contact Add Form View -->
        <div id="contact-form-view" style="display: none;">
            <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                <h2 class="fw-bold mb-0 text-uppercase" style="font-family: 'Space Grotesk', serif, sans-serif; color: #0a2540; font-size: 1.75rem; letter-spacing: 0.5px;">
                    CONTACT MANAGER
                </h2>
                <button type="button" id="btn-back-to-list" onclick="document.getElementById('contact-form-view').style.display='none'; document.getElementById('contact-list-view').style.display='block'; window.scrollTo({top:0, behavior:'smooth'});" class="btn btn-outline-secondary px-3 py-2 fs-7 fw-medium" style="border-radius: 4px;">
                    <i class="bi bi-arrow-left me-1"></i> Back to Contacts
                </button>
            </div>

            <form action="{{ route('contacts.store') }}" method="POST" id="contactAddForm">
                @csrf
                
                <!-- Row 1: Contact Full Name, Company / Firm Name, Designation -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Full Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control py-2 px-3" name="name" required placeholder="Enter Contact Name" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Company / Firm Name
                        </label>
                        <input type="text" class="form-control py-2 px-3" name="company_name" placeholder="Enter Company Name" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Designation
                        </label>
                        <input type="text" class="form-control py-2 px-3" name="designation" placeholder="e.g. Operations Manager / CHA" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                </div>

                <!-- Row 2: Department, Mobile No, Alternate Mobile No -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Department
                        </label>
                        <input type="text" class="form-control py-2 px-3" name="department" placeholder="e.g. Customs Documentation / Logistics" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Mobile No <span class="text-danger">*</span>
                        </label>
                        <input type="tel" class="form-control py-2 px-3" name="mobile_no" required placeholder="Primary Mobile Number" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Alternate Mobile No
                        </label>
                        <input type="tel" class="form-control py-2 px-3" name="alt_mobile_no" placeholder="Secondary Mobile Number" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                </div>

                <!-- Row 3: Landline No, Email ID, City -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Landline / Telephone No
                        </label>
                        <input type="tel" class="form-control py-2 px-3" name="landline_no" placeholder="Office Phone" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Email ID
                        </label>
                        <input type="email" class="form-control py-2 px-3" name="email" placeholder="contact@example.com" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            City / Location
                        </label>
                        <input type="text" class="form-control py-2 px-3" name="city" placeholder="e.g. Pipavav, Rajula, Gandhidham" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;">
                    </div>
                </div>

                <!-- Row 4: Office Address, Notes / Remarks -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Office Address
                        </label>
                        <textarea class="form-control py-2 px-3" name="address" rows="3" placeholder="Enter Full Office Address" style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-dark fw-normal mb-2" style="font-size: 0.9rem;">
                            Notes / Remarks
                        </label>
                        <textarea class="form-control py-2 px-3" name="notes" rows="3" placeholder="Operational instructions or notes..." style="border-color: #cbd5e1; border-radius: 3px; font-size: 0.9rem;"></textarea>
                    </div>
                </div>

                <!-- Form Submit Buttons -->
                <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                    <button type="button" onclick="document.getElementById('contact-form-view').style.display='none'; document.getElementById('contact-list-view').style.display='block';" class="btn btn-light px-4 py-2 text-secondary fw-medium" style="border-radius: 4px; border: 1px solid #cbd5e1; font-size: 0.9rem;">
                        Cancel
                    </button>
                    <button type="submit" class="btn px-4 py-2 text-white fw-medium shadow-sm" style="background-color: #526b74; border-radius: 4px; font-size: 0.9rem; min-width: 120px;">
                        Save Contact
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
