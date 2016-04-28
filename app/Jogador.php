<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model {

	protected $table = 'jogadores';
	
	protected $fillable = ['equipe_id','nome','numero','posicao'];
	
	protected $hidden = ['id','created_at','updated_at'];

	public function equipe() {
		return $this->belongsTo('App\Equipe');
	}
}