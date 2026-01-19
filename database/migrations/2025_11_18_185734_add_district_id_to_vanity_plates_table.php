<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vanity_plates', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('vanity_plates', function (Blueprint $table) {
            $table->dropColumn('district_id');
        });
    }
};
