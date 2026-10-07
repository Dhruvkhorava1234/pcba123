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
        Schema::create('cfs_passes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('application_no')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('landline_no')->nullable();
            $table->string('mobile_no');
            $table->string('identity_proof')->default('Aadhar Card');
            $table->string('aadhar_number')->nullable();
            $table->string('aadhar_file')->nullable();
            $table->string('photo_file')->nullable();
            $table->string('application_type')->default('New');
            $table->string('designation')->nullable();
            $table->string('flat_wing')->nullable();
            $table->string('building_name')->nullable();
            $table->string('road_name')->nullable();
            $table->string('area_locality')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('card_no')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('pass_status')->default('Pending'); // Approve, Pending, Rejected
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfs_passes');
    }
};
