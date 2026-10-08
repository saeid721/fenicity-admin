<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_media', function (Blueprint $table) {
            $table->foreignId('content_id')->constrained('content_items')->cascadeOnDelete();
            $table->foreignId('media_id')->constrained('media')->cascadeOnDelete();
            $table->string('role', 50)->default('gallery');
            $table->integer('sort_order')->default(0);
            $table->primary(['content_id', 'media_id', 'role']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_media');
    }
};
