<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('circulars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // admin who posted
            $table->string('badge_label')->default('BULLETIN');  // e.g. BULLETIN, NOTICE, CIRCULAR, URGENT
            $table->string('title');                             // e.g. "Statutory Notice:"
            $table->text('body');                                // main text
            $table->string('link_label')->nullable();            // e.g. "Read Guidelines"
            $table->string('link_url')->nullable();              // e.g. route or external URL
            $table->boolean('is_active')->default(true);         // show/hide toggle
            $table->date('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('circulars');
    }
};
