<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'member')->first() ?? User::first();
        if ($user) {
            Invoice::updateOrCreate(
                ['receipt_no' => 'RCP-2026-001'],
                [
                    'user_id' => $user->id,
                    'application_no' => null,
                    'membership_type' => 'Ordinary Member',
                    'payment_type' => 'Online',
                    'amount_paid' => 10000,
                    'payment_date' => '2026-04-29',
                    'payment_for' => 'New Membership',
                    'invoice_no' => 'INV-2026-001',
                ]
            );

            Invoice::updateOrCreate(
                ['receipt_no' => 'RCP-2026-002'],
                [
                    'user_id' => $user->id,
                    'application_no' => null,
                    'membership_type' => 'Ordinary Member',
                    'payment_type' => 'Cheque',
                    'amount_paid' => 10000,
                    'payment_date' => '2026-06-17',
                    'payment_for' => 'Membership Renewal',
                    'invoice_no' => 'INV-2026-002',
                ]
            );

            Invoice::updateOrCreate(
                ['receipt_no' => 'RCP-2026-003'],
                [
                    'user_id' => $user->id,
                    'application_no' => '992897',
                    'membership_type' => 'Ordinary Member',
                    'payment_type' => 'Online',
                    'amount_paid' => 500,
                    'payment_date' => '2026-07-31',
                    'payment_for' => 'CHA Application',
                    'invoice_no' => 'INV-2026-003',
                ]
            );
        }
    }
}
