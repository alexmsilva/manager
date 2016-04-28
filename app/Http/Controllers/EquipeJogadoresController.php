<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Equipe;

class EquipeJogadoresController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($id) {
		$equipe = Equipe::find($id);
		if (!$equipe) {
			return response()->json(['message' => 'Esse time não existe', 'code' => 404], 404);
		}

		return response()->json(['data' => $equipe->jogadores], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id, $jogador_id) {
		$equipe = Equipe::find($id);
		if (!$equipe) {
			return response()->json(['message' => 'Esse time não existe', 'code' => 404], 404);
		}

		$jogador = $equipe->jogadores->find($jogador_id);
		if (!$jogador) {
			return response()->json(['message' => 'Esse jogador não existe', 'code' => 404], 404);
		}

		return response()->json(['data' => $jogador], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}