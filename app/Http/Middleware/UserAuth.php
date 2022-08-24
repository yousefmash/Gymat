<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Support\Facades\Cookie;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$user_job_F,$user_job_S=null)
    {   
        if (Cookie::get('user_job') == $user_job_F || Cookie::get('user_job') == $user_job_S) {
            if ($user_job_F != 2) {
                if ($request->is(Cookie::get('gym_name').'/*')) {
                    return $next($request);
                }else{
                    return redirect()->back();
                }
            }else{
                return $next($request);
            }
            
        }else{
            return abort(404);
        }
 
    }
}