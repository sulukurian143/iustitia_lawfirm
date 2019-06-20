<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvent1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eid')->unsigned();
            $table->foreign('eid')->references('id')->on('events');
            $table->string('stime');
            // $table->string('etime');
            $table->string('token');
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
        Schema::dropIfExists('event1s');
    }
}
