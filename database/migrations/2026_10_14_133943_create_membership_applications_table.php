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
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->string('office_type')->default('Main Office');
            $table->string('company_name');
            $table->string('company_type');
            $table->string('authorized_person');
            $table->string('authorized_designation');
            $table->text('address');
            $table->string('city');
            $table->text('correspondence_address')->nullable();
            $table->string('correspondence_city')->nullable();
            $table->string('email');
            $table->string('mobile');
            $table->string('customs_license_no')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('gstin_number')->nullable();
            
            // Payment fields
            $table->decimal('fee_amount', 10, 2)->default(11000.00);
            $table->string('payment_status')->default('Pending'); // Pending, Completed, Failed
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_payment_id')->nullable();
            $table->string('razorpay_signature')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('receipt_no')->nullable();
            
            $table->json('form_payload')->nullable(); // Stores all extended fields safely
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
