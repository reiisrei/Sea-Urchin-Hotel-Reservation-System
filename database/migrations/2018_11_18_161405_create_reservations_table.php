<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('reservationID');
            $table->bigInteger('bookingID')->unsigned();
            $table->date('reservationDate')->nullable();
            $table->date('expiryDate')->nullable();
            $table->boolean('paymentReceived');
            $table->string('status', 20);
            $table->DateTime('actualCheckIn')->nullable();
            $table->DateTime('actualCheckOut')->nullable();
             $table->integer('roomReservedID')->unsigned();
            $table->mediumText('comment')->nullable();
            $table->mediumText('message')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
