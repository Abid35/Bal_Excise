<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('number_patterns', function (Blueprint $table) {
            $table->id();
            $table->string('start_prefix');
            $table->string('end_prefix');
            $table->integer('start_no');
            $table->integer('end_no');
            $table->integer('type');
            $table->string('last_generated_prefix')->nullable();
            $table->integer('last_generated_no')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('number_patterns');
    }
};
