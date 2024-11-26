<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesStudentsRelationshipTable extends Migration

{
    public function up()
    {
        Schema::create('course_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('commission_id');
            $table->timestamps();

            // Relaciones
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade');

            // Restricción única para evitar duplicados
            $table->unique(['student_id', 'course_id'], 'unique_student_course');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_students');
    }
}
