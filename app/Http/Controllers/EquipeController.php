<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Equipe;
use App\Http\Requests\EquipeRequest;

class EquipeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$equipes = Equipe::all();
		return response()->json(['data' => $equipes], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(EquipeRequest $request) {
		Equipe::create($request->only(['nome']));
		return response()->json(['message' => 'Time cadastrado com sucesso'], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$equipe = Equipe::find($id);
		if (!$equipe) {
			return response()->json(['message' => 'Esse time não existe', 'code' => 404], 404);
		}

		return response()->json(['data' => $equipe], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(EquipeRequest $request, $id) {
		$equipe = Equipe::find($id);
		if (!$equipe) {
			return response()->json(['message' => 'Esse time não existe', 'code' => 404], 404);
		}

		$equipe->nome = $request->nome;
		$equipe->save();

		return response()->json(['message' => 'A equipe foi atualizada com sucesso'], 200);
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