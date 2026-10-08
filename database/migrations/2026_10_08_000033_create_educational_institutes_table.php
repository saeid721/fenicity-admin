<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('educational_institutes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('institute_type', 120)->nullable();
            $table->string('website', 1000)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educational_institutes');
    }
};
