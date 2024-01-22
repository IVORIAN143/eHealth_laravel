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
            $table->string('fad_Allergy')->nullable();
            $table->string('fad_indicate')->nullable();
            $table->string('student_id')->nullable();
            $table->string('contact')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('gender')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('civilStat')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('placeOfBirth')->nullable();
            $table->enum('course', ['bsit', 'bsa'])->nullable();
            $table->integer('year')->nullable();
            $table->string('homeAddress')->nullable();
            $table->string('parentName')->nullable();
            $table->string('parentAddress')->nullable();
            $table->string('relationship')->nullable();
            $table->string('parentNumber')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            $table->string('infectedCovid')->nullable();
            $table->string('inferctedWhere')->nullable();
            $table->string('recieveVaccine')->nullable();

            $table->string('vaccineBrand')->nullable();
            $table->string('dose1')->nullable();
            $table->string('dose2')->nullable();
            $table->string('Booster1')->nullable();
            $table->string('Booster2')->nullable();

            $table->date('dateDose1')->nullable();
            $table->date('dateDose2')->nullable();
            $table->date('dateBoostDose1')->nullable();
            $table->date('dateBoostDose2')->nullable();

            $table->string('Location1')->nullable();
            $table->string('Location2')->nullable();
            $table->string('boostLocation1')->nullable();
            $table->string('boostLocation2')->nullable();

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
        Schema::dropIfExists('students');
    }
};
