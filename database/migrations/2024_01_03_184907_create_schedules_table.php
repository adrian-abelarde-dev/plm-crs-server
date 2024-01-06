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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('scheduleID');
            //FK to student terms
            $table->unsignedBigInteger('subjectID');
            $table->foreign('subjectID')->references('subjectID')->on('subjects');
            //FK to student terms
            $table->unsignedBigInteger('sectionID');
            $table->foreign('sectionID')->references('sectionID')->on('sections');
            //FK to colleges
            $table->unsignedBigInteger('collegeID');
            $table->foreign('collegeID')->references('collegeID')->on('colleges');
            //FK to rooms
            $table->unsignedBigInteger('roomID');
            $table->foreign('roomID')->references('roomID')->on('rooms');
            
            $table->integer('credits');
            $table->integer('allotedSlots');
            $table->string('parentClassCode');
            $table->integer('minYearLevel');
            $table->integer('aysem');
            $table->boolean('isInstructorsConcealed');
            $table->boolean('isNoDefiniteTimeDay');
            $table->boolean('isClassHoursToBeAnnounced');
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
        Schema::dropIfExists('schedules');
    }
};
