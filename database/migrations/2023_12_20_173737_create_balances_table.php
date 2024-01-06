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
        Schema::create('balances', function (Blueprint $table) {
            $table->id('balanceID');
            //FK to students
            //$table->unsignedBigInteger('studentID');
            //$table->foreign('studentID')->references('studentID')->on('students');

            $table->integer('yearTerm');
            $table->string('termsOfPayment');
            $table->string('balanceStatus');
            $table->string('assessment');
            $table->double('tuitionFeePerUnit');
            $table->integer('units');
            $table->double('tuitionUnitsTotal');
            $table->json('miscFees');
            $table->json('otherFees');
            $table->double('totalAmount');
            $table->double('paidAmount');
            $table->double('overallPaid');
            $table->double('overallBalance');
            $table->double('amountToBePaid');
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
        Schema::dropIfExists('balances');
    }
};
