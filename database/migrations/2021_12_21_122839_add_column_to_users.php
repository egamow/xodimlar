<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('user')->default(true);
            $table->boolean('admin')->default(false);
            $table->boolean('trainer')->default(false);
            $table->boolean('inspector')->default(false);
            $table->boolean('personnel_officer')->default(false);
            $table->boolean('curator')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user');
            $table->dropColumn('admin');
            $table->dropColumn('trainer');
            $table->dropColumn('inspector');
            $table->dropColumn('personnel_officer');
            $table->dropColumn('curator');

        });
    }
}
