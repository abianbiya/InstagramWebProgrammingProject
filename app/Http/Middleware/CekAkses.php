<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

use DB;

use Session;

class CekAkses 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //DB::beginTransaction();
        $nextRequest = $next($request);
        $routeMenu = DB::table('menu')->pluck('route');
        $routeName = $request->route()->getName();
		$routeNameArray = explode('.', $request->route()->getName());
			if(count($routeNameArray) == 3){
				$routeGroup = $routeNameArray[0].".".$routeNameArray[1];
				$routeAccess = "is_".$routeNameArray[2];
				if(in_array($routeGroup, $routeMenu)){
					$checkAksesPage = DB::table('kewenangan_menu')
						->leftJoin('kewenangan_user', 'kewenangan_menu.id_peran', '=', 'kewenangan_user.id_peran')
						->leftJoin('users', 'users.id', '=', 'kewenangan_user.id_user')
						->leftJoin('menu', 'kewenangan_menu.id_menu', '=', 'menu.id_menu')
						->where('users.id', Auth::user()->id)
						->where('menu.route', $routeNameArray[0].'.'.$routeNameArray[1])
						->where($routeAccess, 1)
						->first();
					if (empty($checkAksesPage)) {
						return redirect(route('home'))
							->with('message', 'Anda Tidak Berhak Mengakses Halaman Ini');
					}else{
						Session::flash('message_success', 'Boleh Akses');
					}
					
					return $nextRequest;
				}else{
					return $nextRequest;
				}
            }else{
				return $nextRequest;
			}
        }
}
