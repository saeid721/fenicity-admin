<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('vehicle_type', 100)->nullable();
            $table->string('registration_no', 100)->nullable();
            $table->string('rental_rate', 150)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
