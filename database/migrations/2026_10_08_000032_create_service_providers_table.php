<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('service_type', 150)->nullable();
            $table->string('phone', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
};
