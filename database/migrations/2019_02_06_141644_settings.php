<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('settings', function (Blueprint $table) {
          $table->increments('id');
          $table->string('phoneNumber');
          $table->string('emailAddress');
          $table->string('address');
          $table->mediumText('aboutUs');
          $table->string('facebook');
          $table->string('twitter');
          $table->string('instagram');
          $table->string('logoHeader');
          $table->string('logoFooter');
          $table->string('HomeSlider1');
          $table->string('HomeSlider2');
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
      Schema::dropIfExists('settings');
    }
}
