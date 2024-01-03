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
        Schema::create('sections', function (Blueprint $table) {
            $table->id('sectionID');
            $table->string('sectionName');
            //FK to colleges
            $table->unsignedBigInteger('collegeID');
            $table->foreign('collegeID')->references('collegeID')->on('colleges');
            //FK to programs
            $table->unsignedBigInteger('programID');
            $table->foreign('programID')->references('programID')->on('programs');
            
            $table->integer('yearLevel');
            $table->integer('aysem');
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
        Schema::dropIfExists('sections');
    }
};
