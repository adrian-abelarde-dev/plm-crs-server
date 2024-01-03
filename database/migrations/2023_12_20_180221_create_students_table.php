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
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            //FK to balances
            $table->unsignedBigInteger('balanceID');
            $table->foreign('balanceID')->references('balanceID')->on('balances');
            //FK to payment histories
            $table->unsignedBigInteger('paymentHistoryID');
            $table->foreign('paymentHistoryID')->references('paymentHistoryID')->on('paymentHistories');
            //FK to assessment histories
            $table->unsignedBigInteger('assessmentHistoryID');
            $table->foreign('assessmentHistoryID')->references('assessmentHistoryID')->on('assessmentHistories');
            //FK to student terms
            //$table->unsignedBigInteger('studentTermID');
            //$table->foreign('studentTermID')->references('studentTermID')->on('studentTerms');

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
        Schema::dropIfExists('students');
    }
};
