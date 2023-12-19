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
       Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('nameExtension')->nullable();
            $table->string('gender')->nullable();
            $table->string('maidenName')->nullable();
            $table->string('plmEmail')->nullable()->unique();
            $table->string('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('civilStatus')->nullable();
            $table->string('country')->nullable();
            $table->string('mobilePhone')->nullable();
            $table->string('streetAddress')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('provinceCity')->nullable();
            $table->string('unit')->nullable();
            $table->string('status')->nullable();
            $table->string('expiryDate')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
