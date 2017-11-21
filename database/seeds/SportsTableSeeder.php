<?php

use Illuminate\Database\Seeder;
use \App\Sport;

class SportsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sports = [
        'Paddle' => [2, 'images/sports/paddle.jpg'],
        'Rugby' => [24, 'images/sports/rugby.jpg'],
        'Volley' => [12, 'images/sports/volley.jpg'],
        'Baseball' => [18, 'images/sports/baseball.jpg'],
        'Basquet' => [ 12, 'images/sports/basquet.jpg'],
        'Hockey Femenino' => [ 22, 'images/sports/hockey.jpg'],
        'Hockey Masculino' => [22, 'images/sports/hockey.jpg'],
        'Handball' => [14, 'images/sports/handball.jpg'],
        'Futbol Masculino 11' => [22, 'images/sports/futbol.jpg'],
        'Futbol Femenino 11' => [22, 'images/sports/futbol.jpg'],
        'Futbol Masculino 5' => [10, 'images/sports/futbol.jpg'],
        'Futbol Femenino 5' => [10, 'images/sports/futbol.jpg'],
        'Softbol' => [18, 'images/sports/softball.jpg'],
        'Pingpong' => [4, 'images/sports/pingpong.jpg'],
        'Tenis' => [4, 'images/sports/paddle.jpg'],
        'Squash' => [4, 'images/sports/squash.jpg'],
        'Bádminton' => [4, 'images/sports/badminton.jpg']
      ];

      foreach( $sports as $sport => $props ) {
        $sport = \App\Sport::create([
          "name" => $sport,
          "players" => $props[0],
          "photo" => $props[1]
        ]);
      }
    }
}
