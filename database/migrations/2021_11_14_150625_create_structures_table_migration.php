<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructuresTableMigration extends Migration
{
    public function up()
    {
//        Schema::create('structures', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('parent_id')->unsigned()->nullable();
//            $table->integer('position', false, true);
//            $table->softDeletes();
//
//            $table->foreign('parent_id')
//                ->references('id')
//                ->on('structures')
//                ->onDelete('set null');
//
//        });

//        Schema::create('structure_closure', function (Blueprint $table) {
//            $table->increments('closure_id');
//
//            $table->integer('ancestor', false, true);
//            $table->integer('descendant', false, true);
//            $table->integer('depth', false, true);
//
//            $table->foreign('ancestor')
//                ->references('id')
////                ->on('structures')
//                ->onDelete('cascade');
//
//            $table->foreign('descendant')
//                ->references('id')
//                ->on('structures')
//                ->onDelete('cascade');
//
//        });
    }

    public function down()
    {
        Schema::dropIfExists('structure_closure');
    }
}
