<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("speciality");
            $table->string("grade");
            $table->string("phone");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
        });

        Schema::create('department_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("department_id");
            $table->unsignedBigInteger("teacher_id");
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
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('department_teacher');
    }
}
