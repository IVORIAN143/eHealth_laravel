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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->enum('course', ['bsit','bsa']);
            $table->integer('year');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('baranggay')->nullable();
            $table->integer('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
