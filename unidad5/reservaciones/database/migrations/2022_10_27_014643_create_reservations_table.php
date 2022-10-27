<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            //TRABAJO EN CLASE - 27/OCT/2022
            $table->id();
            $table->date('date');
            $table->float('price');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();

            /* CÓDIGO DE TAREA - 25/OCT/2022
            $table->id();
            $table->integer('client_id');
            $table->string('name');
            $table->integer('room_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('total');
            $table->timestamps();
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
