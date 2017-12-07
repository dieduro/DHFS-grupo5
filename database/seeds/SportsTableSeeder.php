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
        'Paddle' => [4, 'images/paddle.jpg'],
        'Rugby' => [24, 'images/rugby.jpg'],
        'Volley' => [12, 'images/volley.jpg'],
        'Baseball' => [18, 'images/baseball.jpg'],
        'Basquet' => [ 12, 'images/basquet.jpg'],
        'Hockey Femenino' => [22, 'images/hockey_fem.jpg'],
        'Hockey Masculino' => [22, 'images/hockey.jpg'],
        'Handball' => [14, 'images/handball.jpg'],
        'Futbol Masculino 11' => [22, 'images/futbol.jpg'],
        'Futbol Femenino 11' => [22, 'images/futbol_fem.jpg'],
        'Futbol Masculino 5' => [10, 'images/futbol.jpg'],
        'Futbol Femenino 5' => [10, 'images/futbol_fem.jpg'],
        'Softbol' => [18, 'images/softball.jpg'],
        'Pingpong' => [4, 'images/pingpong.jpg'],
        'Tenis' => [4, 'images/paddle.jpg'],
        'Squash' => [4, 'images/squash.jpg'],
        'Bádminton' => [4, 'images/badminton.jpg']
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
