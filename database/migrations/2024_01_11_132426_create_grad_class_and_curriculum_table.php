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
        Schema::create('grad_class_and_curriculum', function (Blueprint $table) { //stores the relationships between curriculums and classes
            $table->id();
            $table->unsignedBigInteger('curriculumId');
            $table->unsignedBigInteger('courseId');
            $table->foreign('curriculumId')->references('id')->on('grad_curriculums')->onDelete('cascade');
            $table->foreign('courseId')->references('id')->on('grad_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grad_class_and_curriculum');
    }
};
