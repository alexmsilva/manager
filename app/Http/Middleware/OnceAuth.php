<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class OnceAuth {
	/**
	 * The guard factory instance.
	 *
	 * @var \Illuminate\Contracts\Auth\Factory
	 */
	protected $auth;

	/**
	 * Create a new middleware instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Factory  $auth
	 * @return void
	 */
	public function __construct(AuthFactory $auth) {
		$this->auth = $auth;
	}
	

	 /** Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$fails = $this->auth->onceBasic();
		if ($fails) {
			return response()->json([
				'message' => 'Você não possui autorização para fazer este tipo de requisição', 
				'code' => 401], 401);
		}
		return $next($request);
	}
}