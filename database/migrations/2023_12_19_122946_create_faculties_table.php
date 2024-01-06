<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id(); //facultyID
            $table->unsignedBigInteger('userId');
            $table->string('tinNumber');
            $table->string('gsisNumber');
            $table->string('pedigree');
            $table->string('instructorCode');
            $table->boolean('onGraduate'); //added to identify if grad or undergrad prof
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
        Schema::dropIfExists('faculties');
    }
};
