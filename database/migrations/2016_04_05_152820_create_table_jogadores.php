<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJogadores extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jogadores', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('equipe_id')->unsigned();
			$table->string('nome');
			$table->integer('numero');
			$table->string('posicao');
			$table->timestamps();

			$table->foreign('equipe_id')->references('id')->on('equipes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jogadores');
	}
}