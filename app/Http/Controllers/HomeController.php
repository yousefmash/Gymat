<?php

namespace App\Http\Controllers;

use App\Models\GYM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class HomeController extends Controller
{
    
    public function index()
    { 
        if(Auth::check()){
            $gym_name= GYM::where('id',Auth::User()->gym_id)->first();
            Cookie::queue('gym_name', $gym_name->name, 120);
            return redirect("/".$gym_name->name."/dashboard");
        }else{return redirect('/login');}

    }
}
