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
        'Paddle' => 2,
        'Rugby' => 24,
        'Volley' => 12,
        'Baseball' => 18,
        'Basquet' => 12,
        'Hockey Femenino' => 22,
        'Hockey Masculino' => 22,
        'Handball' => 14,
        'Futbol Masculino 11' => 22,
        'Futbol Femenino 11' => 22,
        'Futbol Masculino 5' => 10,
        'Futbol Femenino 5' => 10,
        'Softbol' => 18,
        'Pingpong' => 4,
        'Tenis' => 4,
        'Squash' => 4,
        'Bádminton' => 4
      ];

      foreach($sports as $name => $players) {
        $sport = new Sport;
        $sport->name = $name;
        $sport->players = $players;

        $sport->save();
      }
    }
}
