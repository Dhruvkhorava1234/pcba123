<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circular extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'badge_label',
        'title',
        'body',
        'link_label',
        'link_url',
        'is_active',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_active'    => 'boolean',
            'published_at' => 'date',
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Scope: only active circulars for the public */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
