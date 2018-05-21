<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDecanaturasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decanaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('descripcion', 100);
            $table->char('decano', 100);
            $table->integer('campus_id')->unsigned();
            $table->timestamps();
            $table->foreign('campus_id')->references('id')->on('campuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('decanaturas');
    }
}
