<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('land_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('size', 100)->nullable();
            $table->decimal('price', 16, 2)->nullable();
            $table->string('land_type', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('land_listings');
    }
};
