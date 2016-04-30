<?php

use Illuminate\Database\Seeder;

class ClientsSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('oauth_clients')->insert([
			'id' => '1',
			'secret' => '#segredo_total',
			'name' => 'Fulando da Silva'
		]);
	}
}