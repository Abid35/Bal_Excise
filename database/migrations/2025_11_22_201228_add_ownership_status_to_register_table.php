<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('register', function (Blueprint $table) {
            $table->unsignedInteger('ownership_status')->default(1)->after('registration_no')
                ->comment('Tracks current ownership iteration of the vehicle');
        });
    }

    public function down(): void
    {
        Schema::table('register', function (Blueprint $table) {
            $table->dropColumn('ownership_status');
        });
    }
};
