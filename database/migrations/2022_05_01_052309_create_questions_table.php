<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('test_id');
            $table->string('question');
            $table->string('answer1');
            $table->boolean('check1')->default(false);
            $table->string('answer2');
            $table->boolean('check2')->default(false);
            $table->string('answer3');
            $table->boolean('check3')->default(false);
            $table->string('answer4');
            $table->boolean('check4')->default(false);
            $table->string('answer5')->nullable();
            $table->boolean('check5')->default(false);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
