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
            if (Auth::user()->job_id == 2){
                $gym_name= 'gymat';
                $gym_logo = 'assets/media/logos/logo-solo.svg';
            }else{
                $gym= GYM::where('id',Auth::User()->gym_id)->first();
                $gym_name= $gym->name;
                if ($gym->logo){
                    $gym_logo = env('APP_URL').'/'.'storage/media/gym/'.$gym->logo;
                }else{
                    $gym_logo = 'assets/media/logos/logo-solo.svg';
                }
            }
            Cookie::queue('user_job', Auth::user()->job_id, 180);
            Cookie::queue('gym_logo', $gym_logo, 180);
            Cookie::queue('gym_name', $gym_name, 180);
            return redirect("/".$gym_name."/dashboard");
        }else{return redirect('/login');}

    }
}
