<?php

namespace App\Http\Controllers\admin; 

use App\Http\Controllers\Controller;
use App\Models\GYM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index($gymname)
    {   dd(auth::check());
        if (auth::check()){
            $gym_name= GYM::where('id',Auth::User()->gym_id)->first();
            if ($gym_name->name==$gymname ) {
                return view('dashboard.admin')->with("gym_name", $gymname);
            }
            return redirect("/".$gym_name->name."/dashboard");
        }else{return redirect('/login');}
    }  
    public function gym_index($gymname)
    {   if (auth::check()){
            $arr['gym'] = GYM::leftJoin('gym_packages', 'GYM.gym_package_id', '=', 'gym_packages.id')
            ->leftJoin('users', 'GYM.user_id', '=', 'users.id')
            ->select('GYM.*', 'users.name as user_name','gym_packages.name as gym_package_name')
            ->get();
            return view('dashboard.users')->with($arr)->with("gym_name", $gymname);
        }else{return redirect('/login');}
    }
    
    public function x($gymname)
    {   
        if (auth::check()){
            if(Auth::check()){
                return view('y')->with("gym_name", $gymname);
            }else{
                return view('auth.login');
            }
        }else{return redirect('/login');}
    }
    
}
