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
        Schema::create('student_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId');
            $table->string('programId');
            $table->foreign('programId')->references('programId')->on('programs');
            $table->string('collegeId');
            $table->foreign('collegeId')->references('collegeId')->on('colleges');
            $table->string('blockId');
            $table->integer('yearLevel');
            $table->string('studentStatus');
            $table->string('studentType');
            $table->string('aysem');
            $table->boolean('isEnrolled');
            $table->string('scholasticStatus');
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
