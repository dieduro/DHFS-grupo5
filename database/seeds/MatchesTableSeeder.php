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
        '1' => [3, '2017-12-16', '02:33:13', 'San Isidro','BsAs', 4, 'images/volleyU.jpg', 1, 1],
        '2' => [14, '2017-12-28', '02:33:13', 'Tigre', 'BsAs', 8, 'images/pingpongU.jpg', 1, 1],
        '3' => [6, '2017-12-01', '02:33:13', 'Rosario', 'Sta Fe', 4, 'images/hockeyU.jpg', 1, 1],
        '4' => [2, '2018-01-05', '02:33:13', 'Flores', 'CABA', 2, 'images/rugbyU.jpg', 1, 1],
        '5' => [5, '2018-01-04', '02:33:13', 'Villa Urquiza', 'CABA', 3, 'images/basquetU.jpg', 1, 1],
        '6' => [16, '2017-012-04', '02:33:13', 'Parque Patricios', 'CABA', 3, 'images/squash.jpg', 1, 1]
      ];

      foreach( $matches as $match => $props ) {
        $sport = \App\Match::create([
          "sport_id" => $props[0],
          "date" => $props[1],
          "time" => $props[2],
          "locality" => $props[3],
          "city" => $props[4],
          "nplayers" => $props[5],
          "photo" => $props[6],
          "user_id" => $props[7],
          "active" => $props[8]
        ]);
      }
    }
}
