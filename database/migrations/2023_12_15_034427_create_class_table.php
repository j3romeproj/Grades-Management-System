<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id('class_id');
            $table->unsignedBigInteger('course_id')->unsigned()->index()->nullable();
            $table->foreign('course_id')->references('course_id')->on('course')->onDelete('cascade');
            $table->unsignedBigInteger('faculty_id')->unsigned()->index()->nullable();
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty')->onDelete('cascade');
            $table->unsignedBigInteger('student_id')->unsigned()->index()->nullable();
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
            $table->string('description');
            $table->string('acadYear');
            $table->decimal('finalGrade')->nullable();
            $table->string('gradeStatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};
