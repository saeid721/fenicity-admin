<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->unique()->constrained('content_items')->cascadeOnDelete();
            $table->string('company_name')->nullable();
            $table->string('vacancy', 100)->nullable();
            $table->string('job_type', 100)->nullable();
            $table->string('experience')->nullable();
            $table->date('deadline')->nullable()->index();
            $table->string('salary', 150)->nullable();
            $table->text('qualification')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('requirements')->nullable();
            $table->text('warning')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
