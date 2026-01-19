<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('number_patterns', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable()->after('type');
            $table->boolean('is_government')->default(false)->after('district_id');
        });
    }

    public function down(): void
    {
        Schema::table('number_patterns', function (Blueprint $table) {
            $table->dropColumn(['district_id', 'is_government']);
        });
    }
};
