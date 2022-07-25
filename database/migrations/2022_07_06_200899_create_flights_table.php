<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('seats_count');
            $table->datetime('arrival_time');
            $table->datetime('depature_time');
            $table->string('duration');
            $table->bigInteger('from_airport_id')->unsigned();
            $table->bigInteger('to_airport_id')->unsigned();;

            $table->foreign('from_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('to_airport_id')->references('id')->on('airports')->onDelete('cascade');
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
        Schema::dropIfExists('flights');
    }
}
