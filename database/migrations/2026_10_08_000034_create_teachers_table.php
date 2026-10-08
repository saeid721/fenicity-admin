<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->foreignId('institute_id')->nullable()->constrained('educational_institutes')->nullOnDelete();
            $table->string('subject', 180)->nullable();
            $table->string('qualification')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
