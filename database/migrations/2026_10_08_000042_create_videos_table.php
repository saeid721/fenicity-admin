<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('video_url', 1500);
            $table->string('thumbnail_url', 1000)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
