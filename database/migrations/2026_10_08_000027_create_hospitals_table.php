<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('hospital_type', 100)->nullable();
            $table->string('emergency_phone', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
