<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//User::truncate();
		//DB::table('oauth_clients')->truncate();

		$this->call(UsersSeed::class);
		//$this->call(ClientsSeed::class);
	}
}