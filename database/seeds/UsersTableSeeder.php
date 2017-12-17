<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
        	'username' => 'admin',
          'first_name' => 'Admin',
          'last_name' => "admin",
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt(123456789),
        	'photo' => 'images/users_img/userDefault.png',
        	'remember_token' => str_random(10),
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
      }
}
