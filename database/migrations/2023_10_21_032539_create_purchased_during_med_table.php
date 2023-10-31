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
        Schema::create('purchased_during_med', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_medicine_id')->references('id')->on('medicine')->onDelete('cascade');
            $table->integer('medicine_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchased_during_med');
    }
};
