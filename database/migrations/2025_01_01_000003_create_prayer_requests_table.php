<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prayer_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('category', 30);
            $table->text('request');
            $table->string('visibility', 20)->default('private'); // private, staff, public
            $table->boolean('follow_up')->default(false);
            $table->timestamp('prayed_at')->nullable();
            $table->timestamps();
            $table->index(['visibility', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prayer_requests');
    }
};
