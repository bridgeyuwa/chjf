<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donation_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email');
            $table->string('amount', 100)->nullable();
            $table->date('date_sent')->nullable();
            $table->text('message')->nullable();
            $table->string('status', 20)->default('new'); // new, acknowledged, receipted
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_notifications');
    }
};
