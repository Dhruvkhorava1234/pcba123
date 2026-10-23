<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_no',
        'office_type',
        'company_name',
        'company_type',
        'authorized_person',
        'authorized_designation',
        'address',
        'city',
        'correspondence_address',
        'correspondence_city',
        'email',
        'mobile',
        'customs_license_no',
        'pan_number',
        'gstin_number',
        'fee_amount',
        'payment_status',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'paid_at',
        'receipt_no',
        'form_payload',
    ];

    protected $casts = [
        'fee_amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'form_payload' => 'array',
    ];
}

