<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vanity_plates', function (Blueprint $table) {
            $table->id();
            $table->string('owner_identifier')->comment('CNIC or NTN of the owner requesting vanity plate');
            $table->string('plate_number')->unique()->comment('Custom number plate requested by the owner');
            $table->string('design_type')->nullable()->comment('Selected design type for the plate');
            $table->text('additional_requirements')->nullable()->comment('Custom owner notes or requirements');
            $table->decimal('cost', 10, 2)->nullable()->comment('Cost based on customization');
            $table->enum('status', ['pending', 'approved', 'rejected', 'issued'])->default('pending');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vanity_plates');
    }
};
