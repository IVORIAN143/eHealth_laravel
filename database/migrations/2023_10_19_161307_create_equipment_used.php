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
        Schema::create('equipment_used', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_equip_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->foreignId('fk_consultation_id')->references('id')->on('consultation')->onDelete('cascade');
            $table->integer('equip_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_used');
    }
};
