<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCombosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concepto_id1')->unsigned();
            $table->integer('concepto_id2')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->timestamps();
            $table->foreign('concepto_id1')->references('id')->on('conceptos');
            $table->foreign('concepto_id2')->references('id')->on('conceptos');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('combos');
    }
}
