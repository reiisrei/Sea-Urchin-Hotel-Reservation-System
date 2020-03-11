<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reservations', function($table)
      {
          $table->foreign('bookingID')->references('bookingID')->on('bookings')->onDelete('cascade');
          $table->foreign('roomReservedID')->references('roomReservedID')->on('room_reserveds')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
