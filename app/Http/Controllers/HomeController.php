<?php

namespace App\Http\Controllers;

use App\Models\GYM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    { 
        if(Auth::check()){
            $gym_name= GYM::where('id',Auth::User()->gym_id)->first();
            return redirect("/".$gym_name->name."/dashboard");
        }else{return redirect('/login');}

    }
}
