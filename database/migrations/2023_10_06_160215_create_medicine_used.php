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
        Schema::create('medicine_used', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_med_id')->references('id')->on('medicine')->onDelete('cascade');
            $table->foreignId('fk_consultation_id')->references('id')->on('consultation')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_used');
    }
};
