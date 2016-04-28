<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::create([
			'email' => 'fake@user.com',
			'password' => Hash::make('secret123')
		]);
	}
}