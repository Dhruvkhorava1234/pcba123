<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CfsPass extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'application_no',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'blood_group',
        'landline_no',
        'mobile_no',
        'identity_proof',
        'aadhar_number',
        'aadhar_file',
        'photo_file',
        'application_type',
        'designation',
        'flat_wing',
        'building_name',
        'road_name',
        'area_locality',
        'city',
        'pincode',
        'card_no',
        'payment_status',
        'pass_status',
    ];

    protected function casts(): array
    {
        return [
            'dob' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }
}
