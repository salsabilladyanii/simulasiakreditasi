<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class Authlogedin
{
	public function handle(Request $request, Closure $next){
		$session  = $request->session()->get('auth_user');
		if (empty($session)) {
			if ($request->ajax()) {
				return die(json_encode(['code' => 401, 'message' => 'Yuk login untuk melanjutkan belanja']));
			}
			return redirect('/login');
		}
		return $next($request);
	}
}