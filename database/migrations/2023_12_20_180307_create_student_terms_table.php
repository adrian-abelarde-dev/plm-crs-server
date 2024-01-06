<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentTerms', function (Blueprint $table) {
            $table->id('studentTermID');
            //FK to students
            $table->unsignedBigInteger('studentID');
            $table->foreign('studentID')->references('studentID')->on('gradstudents');
            //FK to programs
            $table->unsignedBigInteger('programID');
            $table->foreign('programID')->references('programID')->on('programs');
            //FK to colleges
            $table->unsignedBigInteger('collegeID');
            $table->foreign('collegeID')->references('collegeID')->on('colleges');
            //FK to blocks
            $table->unsignedBigInteger('blockID');
            $table->foreign('blockID')->references('blockID')->on('blocks');

            $table->integer('yearLevel');
            $table->integer('studentStatus');
            $table->integer('studentType');
            $table->integer('aysem');
            $table->boolean('isEnrolled');
            $table->boolean('scholasticStatus');
            $table->boolean('isGraduating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_terms');
    }
};
