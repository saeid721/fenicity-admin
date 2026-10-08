<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rental_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('property_type', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('balcony')->nullable();
            $table->integer('kitchen')->nullable();
            $table->string('floor', 50)->nullable();
            $table->decimal('amount', 14, 2)->nullable();
            $table->date('available_from')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_properties');
    }
};
