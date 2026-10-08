<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->foreignId('source_id')->nullable()->constrained('news_sources')->nullOnDelete();
            $table->string('external_url', 1500)->nullable();
            $table->dateTime('published_on')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_articles');
    }
};
