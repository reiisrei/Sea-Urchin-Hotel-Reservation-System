<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('bookingID')->unsigned();
            $table->integer('clientID')->unsigned();
            $table->string('checkInDate');
            $table->string('checkOutDate');
            $table->integer('n_person');
            $table->integer('amenityID')->unsigned()->nullable();
            $table->integer('paymentID')->unsigned();
            $table->integer('numNights');
            $table->date('bookExpire');
            $table->boolean('unread')->default(1);
            $table->timestamps();
        });
        DB::update("ALTER TABLE bookings AUTO_INCREMENT = 565321;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      // $table->dropForeign('lists_user_id_foreign');
      // $table->dropIndex('lists_user_id_index');
      // $table->dropColumn('user_id');
        Schema::dropIfExists('bookings');
    }
}
