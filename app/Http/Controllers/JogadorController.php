<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jogador;

class JogadorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$jogadores = Jogador::all();
		return response()->json(['data' => $jogadores], 200);	
	}
}