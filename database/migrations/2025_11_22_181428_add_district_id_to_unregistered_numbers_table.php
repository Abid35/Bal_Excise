<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('unregistered_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable()->after('eto_name');
        });
    }

    public function down(): void
    {
        Schema::table('unregistered_numbers', function (Blueprint $table) {
            $table->dropColumn('district_id');
        });
    }
};
