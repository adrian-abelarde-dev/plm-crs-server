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
        Schema::create('paymentHistories', function (Blueprint $table) {
            $table->id('paymentHistoryID');
            //FK to students
            //$table->unsignedBigInteger('studentID');
            //$table->foreign('studentID')->references('studentID')->on('students');

            $table->string('paymentType');
            $table->string('paymentMethod');
            $table->integer('yearTerm');
            $table->integer('orNumber');
            $table->double('amount');
            $table->string('code');
            $table->string('remarks');
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
        Schema::dropIfExists('payment_histories');
    }
};
