<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->decimal('rating', 2, 1)->nullable();
            $table->text('room_info')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
