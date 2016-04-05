<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

	protected $fillable = ['nome'];
	
	protected $hidden = ['id','created_at','updated_at'];

	public function jogadores() {
		return $this->hasMany('App\Jogador');
	}
}