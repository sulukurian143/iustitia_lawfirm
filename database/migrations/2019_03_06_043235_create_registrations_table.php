<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cid');
            $table->index('cid');
            $table->foreign('cid')->references('id')->on('lawyer_details')->onDelete('cascade');
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->string('type');
            $table->string('proof');
            $table->string('gender');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('email',60)->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('status');
            $table->string('approve');
            $table->string('remember_token');
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
        Schema::dropIfExists('registrations');
    }
}
