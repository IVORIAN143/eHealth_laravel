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
        Schema::create('consultation', function (Blueprint $table) {
            $table->id()->nullable();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('complaints', 255)->nullable();
            $table->string('diagnosis', 255)->nullable();
            $table->string('instruction', 255)->nullable();
            $table->string('remarks', 255)->nullable();
            $table->integer('status')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('schoolYear')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation');
    }
};
