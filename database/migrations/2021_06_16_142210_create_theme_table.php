<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("objective")->nullable();
            $table->text("resume")->nullable();
            $table->string("status")->default("active");
            $table->unsignedBigInteger("speciality_id");
            $table->unsignedBigInteger("teacher_id");
            $table->timestamps();
        });

        Schema::create('student_theme', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("student_id");
            $table->unsignedBigInteger("theme_id");
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
        Schema::dropIfExists('theme');
        Schema::dropIfExists('student_theme');
    }
}
