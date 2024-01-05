<?php

// database/migrations/YYYY_MM_DD_create_ug_grades_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgGradesTable extends Migration
{
    public function up()
    {
        Schema::create('ug_grades', function (Blueprint $table) {
            $table->id();
            $table->string('subjectId');
            $table->unsignedBigInteger('studentId');
            $table->unsignedBigInteger('facultyId');
            $table->string('grade');
            $table->string('aysem');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ug_grades');
    }
}
