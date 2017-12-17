<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('matches', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sport_id')->references('id')->on('sports');
      $table->dateTime('date');
      $table->string('name')->nullable();
      $table->string('street_number')->nullable();
      $table->string('locality')->nullable();
      $table->string('city')->nullable();
      $table->string('country')->nullable();
      $table->integer('nplayers');
      $table->text('comment')->nullable();
      $table->string('photo');
      $table->integer('user_id')->references('id')->on('users');
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
    Schema::dropIfExists('matches');
  }
}
