<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'designation',
        'department',
        'company_name',
        'email',
        'mobile_no',
        'alt_mobile_no',
        'landline_no',
        'city',
        'address',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
