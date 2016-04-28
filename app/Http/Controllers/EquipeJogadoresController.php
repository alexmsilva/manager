<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Equipe;
use App\Http\Requests\JogadorRequest;

class EquipeJogadoresController extends Controller {

	public function __construct() {
		$this->middleware('auth.basic', ['except' => ['index', 'show']]);
	}
	
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
	 * @param  int  $equipe_id
	 * @return \Illuminate\Http\Response
	 */
	public function store(JogadorRequest $request, $equipe_id) {
		$equipe = Equipe::find($equipe_id);
		if (!$equipe_id) {
			return response()->json(['message' => 'Esse time não existe', 'code' => 404], 404);
		}

		$equipe->jogadores()->create($request->all());

		return $response()->json(['message' => 'Jogador criado com sucesso'], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $equipe_id
	 * @param  int  $jogador_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($equipe_id, $jogador_id) {
		$equipe = Equipe::find($equipe_id);
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
	 * @param  App\Http\Requests\JogadorRequest  $request
	 * @param  int  $equipe_id
	 * @param  int  $jogador_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(JogadorRequest $request, $equipe_id, $jogador_id) {
		$equipe = Equipe::find($equipe_id);
		if (!$equipe) {
			return response()->json(['message' => 'Esse time não existe', 'code' => 404], 404);
		}

		$jogador = $equipe->jogadores->find($jogador_id);
		if (!$jogador) {
			return response()->json(['message' => 'Esse Jogador não existe', 'code' => 404], 404);
		}

		$jogador->fill($request->all());
		$jogador->save();

		return response()->json(['message' => 'Jogador atualizado com sucesso'], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $equipe_id
	 * @param  int  $jogador_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($equipe_id, $jogador_id) {
		$equipe = Equipe::find($equipe_id);
		if (!$equipe) {
			return response()->json(['message' => 'Este time não existe', 'code' => 404], 404);
		}

		$jogador = $equipe->jogadores->find($jogador_id);
		if (!$jogador) {
			return response()->json(['message' => 'Este Jogador não existe', 'code' => 404], 404);
		}

		$jogador->delete();
		
		return response()->json(['message' => 'Este jogador foi deletado'], 200);
	}
}