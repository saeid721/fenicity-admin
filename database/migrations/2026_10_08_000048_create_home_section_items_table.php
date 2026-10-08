<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_section_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('home_sections')->cascadeOnDelete();
            $table->foreignId('content_id')->nullable()->constrained('content_items')->nullOnDelete();
            $table->string('title')->nullable();
            $table->string('image_url', 1000)->nullable();
            $table->string('url', 1500)->nullable();
            $table->integer('sort_order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_section_items');
    }
};
