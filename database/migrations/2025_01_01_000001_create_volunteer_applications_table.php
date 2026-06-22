<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('volunteer_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email');
            $table->string('phone', 30);
            $table->string('city', 100);
            $table->string('age_range', 10);
            $table->string('program', 50);
            $table->string('availability', 30);
            $table->string('commitment', 30);
            $table->string('referral', 20)->nullable();
            $table->string('skills', 500)->nullable();
            $table->text('motivation')->nullable();
            $table->text('experience')->nullable();
            $table->boolean('consent_background_check')->default(false);
            $table->boolean('consent_data')->default(false);
            $table->string('status', 20)->default('new'); // new, reviewing, accepted, declined
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_applications');
    }
};
