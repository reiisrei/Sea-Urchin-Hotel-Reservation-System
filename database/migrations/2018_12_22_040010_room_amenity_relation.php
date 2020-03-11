<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomAmenityRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('room_amenities', function($table)
      {
          $table->foreign('amenityID')->references('amenityID')->on('amenities')->onDelete('cascade');
          $table->foreign('roomID')->references('roomID')->on('available_rooms')->onDelete('cascade');
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
