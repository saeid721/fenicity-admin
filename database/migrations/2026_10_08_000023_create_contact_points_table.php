<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('content_items')->cascadeOnDelete();
            $table->string('label', 80)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 190)->nullable();
            $table->string('website', 1000)->nullable();
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
            $table->index(['content_id', 'is_primary']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_points');
    }
};
