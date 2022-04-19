<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('login')->unique();
            $table->string('password');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('phone')->unique();
            $table->integer('region_id')->nullable();
            $table->boolean('is_staff')->default(0);
            $table->integer('department_id')->nullable();
            $table->integer('position_id')->nullable();
            $table->string('photo_url')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
