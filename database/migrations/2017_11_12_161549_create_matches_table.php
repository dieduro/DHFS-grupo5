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
      $table->integer('sport_id');
      $table->dateTime('date');
      $table->string('place');
      $table->integer('nplayers');
      $table->text('comment')->nullable();
      $table->string('photo');
      $table->integer('user_id');
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
