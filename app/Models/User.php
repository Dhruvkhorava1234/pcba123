<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /* ── Role helpers ─────────────────────────────────── */
    public function isAdmin(): bool  { return $this->role === 'admin'; }
    public function isMember(): bool { return $this->role === 'member'; }

    /* ── Relationships (user_id as pivot to everything) ─ */

    /** CFS Pass applications submitted by this member */
    public function cfsPasses()
    {
        return $this->hasMany(CfsPass::class);
    }

    /** Grievances raised by this member */
    public function grievances()
    {
        return $this->hasMany(Grievance::class);
    }

    /** Contacts stored by this member */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /** Invoices / receipts belonging to this member */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
