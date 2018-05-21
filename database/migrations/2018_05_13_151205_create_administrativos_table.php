<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministrativosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->integer('comision');
            $table->integer('estado_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->timestamps();
            $table->foreign('persona_id')->references('id')->on('personas');
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
        Schema::drop('administrativos');
    }
}
