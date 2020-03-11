<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookingRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('bookings', function($table)
      {
          $table->foreign('clientID')->references('clientID')->on('clients')->onDelete('cascade');
          $table->foreign('roomTypeID')->references('roomTypeID')->on('room_types')->onDelete('cascade');
          $table->foreign('amenityID')->references('amenityID')->on('amenities')->onDelete('cascade');
          $table->foreign('paymentID')->references('paymentID')->on('payments')->onDelete('cascade');
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
