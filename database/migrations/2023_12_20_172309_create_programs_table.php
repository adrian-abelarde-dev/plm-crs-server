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
        Schema::create('programs', function (Blueprint $table) {
            $table->id('programID');
            $table->string('programName');
            $table->integer('programType');
            //Fk to colleges
            $table->unsignedBigInteger('collegeID');
            $table->foreign('collegeID')->references('collegeID')->on('colleges');
            
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
        Schema::dropIfExists('programs');
    }
};
