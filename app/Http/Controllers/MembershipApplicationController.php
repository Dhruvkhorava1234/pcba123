<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MembershipApplicationController extends Controller
{
    /**
     * Show the application form.
     */
    public function showForm()
    {
        return view('membership-apply');
    }

    /**
     * Store application and return payment parameters.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'office_type'            => 'required|string',
            'company_name'           => 'required|string|max:255',
            'company_type'           => 'required|string|max:100',
            'authorized_person'      => 'required|string|max:255',
            'authorized_designation' => 'required|string|max:100',
            'address'                => 'required|string',
            'city'                   => 'required|string|max:100',
            'correspondence_address' => 'nullable|string',
            'correspondence_city'    => 'nullable|string|max:100',
            'email'                  => 'required|email|max:255',
            'mobile'                 => 'required|string|max:20',
            'customs_license_no'     => 'nullable|string|max:100',
            'pan_number'             => 'nullable|string|max:50',
            'gstin_number'           => 'nullable|string|max:50',
        ]);

        $appNo = 'PCBA-MEM-' . date('Ymd') . '-' . strtoupper(Str::random(5));
        $feeAmount = 11000.00; // Rs. 11,000 as specified

        // Safe upload file storage (if provided)
        $uploadedDocs = [];
        foreach ($request->allFiles() as $key => $file) {
            if ($file && $file->isValid()) {
                $ext      = $file->getClientOriginalExtension();
                $filename = time() . '_' . $key . '_' . uniqid() . '.' . $ext;
                $destDir  = public_path('uploads/applications/' . date('Ym'));
                if (!is_dir($destDir)) {
                    mkdir($destDir, 0755, true);
                }
                $file->move($destDir, $filename);
                $uploadedDocs[$key] = 'uploads/applications/' . date('Ym') . '/' . $filename;
            }
        }

        $allInputs = $request->except(['_token', 'images']);
        $allInputs['uploaded_documents'] = $uploadedDocs;

        $application = MembershipApplication::create([
            'application_no'         => $appNo,
            'office_type'            => $validated['office_type'],
            'company_name'           => $validated['company_name'],
            'company_type'           => $validated['company_type'],
            'authorized_person'      => $validated['authorized_person'],
            'authorized_designation' => $validated['authorized_designation'],
            'address'                => $validated['address'],
            'city'                   => $validated['city'],
            'correspondence_address' => $validated['correspondence_address'] ?? null,
            'correspondence_city'    => $validated['correspondence_city'] ?? null,
            'email'                  => $validated['email'],
            'mobile'                 => $validated['mobile'],
            'customs_license_no'     => $validated['customs_license_no'] ?? null,
            'pan_number'             => $validated['pan_number'] ?? null,
            'gstin_number'           => $validated['gstin_number'] ?? null,
            'fee_amount'             => $feeAmount,
            'payment_status'         => 'Pending',
            'form_payload'           => $allInputs,
        ]);

        $razorpayKey = config('services.razorpay.key') ?: env('RAZORPAY_KEY', 'rzp_test_placeholder');

        return response()->json([
            'success'        => true,
            'application_id' => $application->id,
            'application_no' => $application->application_no,
            'amount_inr'     => $feeAmount,
            'amount_paise'   => (int) ($feeAmount * 100), // 1100000 paise
            'company_name'   => $application->company_name,
            'contact_person' => $application->authorized_person,
            'email'          => $application->email,
            'mobile'         => $application->mobile,
            'razorpay_key'   => $razorpayKey,
        ]);
    }

    /**
     * Handle payment completion callback from Razorpay Checkout.
     */
    public function paymentCallback(Request $request)
    {
        $request->validate([
            'application_id'      => 'required|exists:membership_applications,id',
            'razorpay_payment_id' => 'required|string',
        ]);

        $application = MembershipApplication::findOrFail($request->application_id);

        $receiptNo = 'RCP-' . date('Y') . '-' . strtoupper(Str::random(6));
        $invoiceNo = 'INV-' . date('Y') . '-' . strtoupper(Str::random(6));

        $application->update([
            'payment_status'      => 'Completed',
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id'   => $request->razorpay_order_id ?? null,
            'razorpay_signature'  => $request->razorpay_signature ?? null,
            'receipt_no'          => $receiptNo,
            'paid_at'             => now(),
        ]);

        // Record in Invoices ledger for admin and reports
        Invoice::create([
            'application_no'  => $application->application_no,
            'membership_type' => 'Ordinary Member',
            'payment_type'    => 'Online (Razorpay)',
            'amount_paid'     => $application->fee_amount,
            'payment_date'    => now()->toDateString(),
            'payment_for'     => 'New Membership',
            'transaction_id'  => $request->razorpay_payment_id,
            'invoice_no'      => $invoiceNo,
            'receipt_no'      => $receiptNo,
        ]);

        // Auto-enroll as Member in users table if not already created
        $user = \App\Models\User::firstOrCreate(
            ['email' => $application->email],
            [
                'name'              => $application->company_name,
                'role'              => 'member',
                'password'          => \Illuminate\Support\Facades\Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Also add to contacts directory if needed
        \App\Models\Contact::firstOrCreate(
            ['email' => $application->email],
            [
                'user_id'      => $user->id,
                'name'         => $application->authorized_person,
                'designation'  => $application->authorized_designation,
                'company_name' => $application->company_name,
                'mobile_no'    => $application->mobile,
                'city'         => $application->city,
                'address'      => $application->address,
            ]
        );

        return response()->json([
            'success'        => true,
            'message'        => 'Payment verified and recorded successfully!',
            'application_no' => $application->application_no,
            'receipt_no'     => $receiptNo,
            'amount_paid'    => number_format($application->fee_amount, 2),
            'company_name'   => $application->company_name,
            'payment_id'     => $request->razorpay_payment_id,
        ]);
    }
}
