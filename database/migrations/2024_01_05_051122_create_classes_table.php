<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('courseCode');
            $table->string('section');
            $table->string('courseTitle');
            $table->integer('units');
            $table->string('classSchedule');
            $table->integer('studentCount');
            $table->integer('creditedUnits');
            $table->string('college');
            $table->string('loadType');
            $table->string('aysem');
            $table->unsignedBigInteger('facultyId');
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
        Schema::dropIfExists('classes');
    }
}
