<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('paymentID');
            $table->integer('clientID')->unsigned();
            $table->string('paymentMethod', 50);
            $table->string('invoiceNumber', 20)->nullable();
            $table->string('accountName', 50)->nullable();
            $table->integer('ammountPaid')->nullable();
            $table->date('datePaid')->nullable();
            $table->string('payment_image')->nullable();
            $table->string('comments', 100)->nullable();
            $table->boolean('unread')->default(1);
            $table->integer('discount')->nullable();
            $table->integer('damages')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
