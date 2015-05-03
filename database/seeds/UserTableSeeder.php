<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();
		User::create(['email' => 'chris@the816.com', 'name' => 'Chris Riebschlager', 'password' => Hash::make('757beer')]);
	}

}