<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grievance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'council',
        'subject',
        'query',
        'answer',
        'status',
        'member_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
