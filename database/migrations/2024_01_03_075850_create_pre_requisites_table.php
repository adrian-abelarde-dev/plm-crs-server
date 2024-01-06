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
        Schema::create('preRequisites', function (Blueprint $table) {
            $table->id('preRequisiteID');
            //FK to courses
            $table->unsignedBigInteger('courseID');
            $table->foreign('courseID')->references('courseID')->on('courses');

            $table->string('preRequisiteTo');
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
        Schema::dropIfExists('pre_requisites');
    }
};
