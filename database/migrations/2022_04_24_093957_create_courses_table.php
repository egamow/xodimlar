<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_of_students');
            $table->integer('number_of_lessons');
            $table->integer('user1_id')->unsigned();
            $table->integer('user2_id')->unsigned()->nullable();
            $table->integer('test_id')->unsigned()->nullable();
            $table->date('begin_date')->nullable();
            $table->date('test_deadline')->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('courses');
    }
}
