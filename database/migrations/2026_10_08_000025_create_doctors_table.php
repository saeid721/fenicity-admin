<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->foreignId('specialty_id')->nullable()->constrained('doctor_specialties')->nullOnDelete();
            $table->string('degree')->nullable();
            $table->string('designation')->nullable();
            $table->string('chamber')->nullable();
            $table->decimal('consultation_fee', 12, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
