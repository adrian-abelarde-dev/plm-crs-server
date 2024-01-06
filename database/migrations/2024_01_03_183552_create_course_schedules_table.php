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
        Schema::create('courseSchedules', function (Blueprint $table) {
            $table->id('courseScheduleID');
            //FK to courses
            $table->unsignedBigInteger('courseID');
            $table->foreign('courseID')->references('courseID')->on('courses');
            //FK to blocks
            $table->unsignedBigInteger('blockID');
            $table->foreign('blockID')->references('blockID')->on('blocks');

            $table->boolean('isInstructorsConcealed');
            $table->boolean('isNoDefiniteTimeDay');
            $table->boolean('isClassHoursToBeAnnounced');
            $table->string('updatedBy');
            $table->boolean('status');
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
        Schema::dropIfExists('course_schedules');
    }
};
