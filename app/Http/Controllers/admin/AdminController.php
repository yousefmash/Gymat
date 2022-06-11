<?php

namespace App\Http\Controllers\admin; 

use App\Http\Controllers\Controller;
use App\Models\GYM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {  
        if (auth::check()){
            return view('dashboard.admin');
        }else{return redirect('/login');}
    }  
    public function gym_index()
    {   if (auth::check()){
            $arr['gym'] = GYM::leftJoin('gym_packages', 'GYM.gym_package_id', '=', 'gym_packages.id')
            ->leftJoin('users', 'GYM.user_id', '=', 'users.id')
            ->select('GYM.*', 'users.name as user_name','gym_packages.name as gym_package_name')
            ->get();
            return view('dashboard.users')->with($arr);
        }else{return redirect('/login');}
    }
    
}
