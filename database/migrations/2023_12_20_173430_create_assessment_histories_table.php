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
        Schema::create('assessmentHistories', function (Blueprint $table) {
            $table->id('assessmentHistoryID');
            //FK to students
            //$table->unsignedBigInteger('studentID');
            //$table->foreign('studentID')->references('studentID')->on('students');

            $table->integer('yearTerm');
            $table->double('totalTuition');
            $table->double('paidAmount');
            $table->double('balance');
            $table->unsignedBigInteger('studentID')->index()->nullable();
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
        Schema::dropIfExists('assessment_histories');
    }
};
