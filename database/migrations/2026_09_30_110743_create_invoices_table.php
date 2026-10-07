<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('application_no')->nullable(); // For CFS Pass or application number
            $table->string('membership_type')->default('Ordinary Member'); // e.g. Ordinary Member, Associate Member
            $table->string('payment_type')->default('Online'); // e.g. Online, Cheque, NEFT, Cash
            $table->decimal('amount_paid', 10, 2)->default(0.00);
            $table->date('payment_date')->nullable();
            $table->string('payment_for'); // e.g. 'New Membership', 'Membership Renewal', 'CHA Application'
            $table->string('transaction_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('receipt_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
