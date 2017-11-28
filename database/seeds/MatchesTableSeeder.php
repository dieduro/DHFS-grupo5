<?php

use Illuminate\Database\Seeder;
use \App\Match;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $matches = [
        '1' => [2, '2017-11-28 02:33:13', 'CASI', 4, 'images/sports/paddle.jpg', 1],
        '2' => [3, '2017-11-28 02:33:13', 'YCO', 8, 'images/sports/rugby.jpg', 1],
        '3' => [6, '2017-11-28 02:33:13', 'Club Asturiano', 4, 'images/sports/volley.jpg', 1],
        '4' => [4, '2017-11-28 02:33:13', 'Club Trovador', 2, 'images/sports/baseball.jpg', 1],
        '5' => [3, '2017-11-28 02:33:13', 'Club Comunicaciones', 3, 'images/sports/basquet.jpg', 1]
      ];

      foreach( $matches as $match => $props ) {
        $sport = \App\Match::create([
          "sport_id" => $props[0],
          "date" => $props[1],
          "place" => $props[2],
          "nplayers" => $props[3],
          "photo" => $props[4],
          "user_id" => $props[5]
        ]);
      }
    }
}
