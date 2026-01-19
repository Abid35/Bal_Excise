<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // php artisan migrate --path=/database/migrations/2025_10_07_193922_create_unregistered_numbers_table.php
    // https://chatgpt.com/share/68e56e29-6078-8003-b9e4-29e2e8693afc
    public function up(): void
    {
        Schema::create('unregistered_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no');
            $table->string('owner_cnic')->nullable();
            $table->string('owner_ntn')->nullable();
            $table->unsignedBigInteger('eto_names')->nullable();
            $table->boolean('is_assigned')->default(false);
            $table->date('expired_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unregistered_numbers');
    }
};

