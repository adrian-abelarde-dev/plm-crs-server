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
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('nameExtension')->nullable(); 
            $table->integer('gender'); //gender was set to integer M=0, F=1
            $table->string('maidenName')->nullable();
            $table->string('plmEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->date('birthday');
            $table->string('birthplace');
            $table->string('civilStatus');
            //$table->string('country'); 
            $table->string('mobilePhone');
            $table->string('streetAddress');
            $table->string('zipCode');
            $table->string('provinceCity');
            $table->integer('unit');
            $table->string('updatedBy');
            $table->boolean('status');
            $table->timestamp('expiryDate')->default(now());
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
        Schema::dropIfExists('users');
    }
};
