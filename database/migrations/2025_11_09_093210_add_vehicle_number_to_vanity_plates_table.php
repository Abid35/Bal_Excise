<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vanity_plates', function (Blueprint $table) {
            $table->string('vehicle_number', 50)
                ->nullable()
                ->after('plate_number')
                ->comment('Linked vehicle registration number');
        });
    }

    public function down(): void
    {
        Schema::table('vanity_plates', function (Blueprint $table) {
            $table->dropColumn('vehicle_number');
        });
    }
};
