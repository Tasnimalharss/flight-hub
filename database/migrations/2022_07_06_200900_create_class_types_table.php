<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->float('baggage_allowance');
            $table->enum('ticket_type', ['one_way' => 'One-way','roundtrip'=>'Roundtrip']);
            $table->foreignId('flight_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('class_types');
    }
}
