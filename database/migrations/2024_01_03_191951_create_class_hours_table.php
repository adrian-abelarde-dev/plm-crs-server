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
        Schema::create('classHours', function (Blueprint $table) {
            $table->id('classHoursID');
            //FK to schedule
            $table->unsignedBigInteger('scheduleID');
            $table->foreign('scheduleID')->references('scheduleID')->on('schedules');
            //FK to courseSchedule
            $table->unsignedBigInteger('courseScheduleID');
            $table->foreign('courseScheduleID')->references('courseScheduleID')->on('courseSchedules');
            //FK to rooms
            $table->unsignedBigInteger('roomID');
            $table->foreign('roomID')->references('roomID')->on('rooms');
            //FK to meetingTypes
            $table->unsignedBigInteger('meetingTypeID');
            $table->foreign('meetingTypeID')->references('meetingTypeID')->on('meetingTypes');

            $table->string('day');
            $table->time('start');
            $table->time('finish');
            $table->integer('aysem');
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
        Schema::dropIfExists('class_hours');
    }
};
