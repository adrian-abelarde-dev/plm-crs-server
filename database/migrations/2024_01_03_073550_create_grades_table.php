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
        Schema::create('grades', function (Blueprint $table) {
            $table->id('gradesID');
            //FK to subjects
            $table->unsignedBigInteger('subjectID');
            $table->foreign('subjectID')->references('subjectID')->on('subjects');
            //FK to courses
            $table->unsignedBigInteger('courseID');
            $table->foreign('courseID')->references('courseID')->on('courses');
            //FK to student terms
            $table->unsignedBigInteger('studentTermID');
            $table->foreign('studentTermID')->references('studentTermID')->on('studentTerms');
            //FK to faculties
            $table->unsignedBigInteger('facultyID');
            $table->foreign('facultyID')->references('facultyID')->on('faculties');

            $table->double('grade');
            $table->integer('aysem');
            $table->string('remarks');
            $table->string('updatedBy');
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
        Schema::dropIfExists('grades');
    }
};
