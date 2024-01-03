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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id('blockID');
            $table->string('blockName');
            //FK to programs
            $table->unsignedBigInteger('programID');
            $table->foreign('programID')->references('programID')->on('programs');
            //FK to colleges
            $table->unsignedBigInteger('collegeID');
            $table->foreign('collegeID')->references('collegeID')->on('colleges');
            
            $table->integer('slots');
            $table->integer('yearLevel');
            $table->integer('enlisted');
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
        Schema::dropIfExists('blocks');
    }
};
