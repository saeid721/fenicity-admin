<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->dateTime('start_at')->nullable()->index();
            $table->dateTime('end_at')->nullable();
            $table->string('venue')->nullable();
            $table->string('organizer')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
