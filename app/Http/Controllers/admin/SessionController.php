<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User_SearchRequest;
use App\Models\contract;
use App\Models\food_table;
use App\Models\GYM;
use App\Models\User;
use App\Models\movement;
use App\Models\Package;
use App\Models\user_session;
use App\Models\user_wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    public function index()
    {
        if (auth::check()){
            $arr['now_sessions'] = user_session::where('user_sessions.gym_id', Auth::user()->gym_id)
                                ->whereNull('leave')
                                ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
                                ->select('user_sessions.*', 'users.name as user_name')
                                ->get();
            $arr['day_sessions'] = user_session::where('user_sessions.gym_id', Auth::user()->gym_id)
                                ->whereDate('user_sessions.created_at', Carbon::today()->format('Y-m-d'))
                                ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
                                ->select('user_sessions.*', 'users.name as user_name')
                                ->get();
                return view('sessions.dashboard')->with($arr);

        }else{return redirect('/login');}
    }
    
    public function arrival_search(User_SearchRequest $request)
    {  
        if (auth::check()) {
            if (auth::check()) {
                $users_gym_id=Auth::user()->gym_id*10000;
                if($request['user_type']=='name'){$user = User::where([['name',$request['user']],['gym_id',Auth::user()->gym_id]])->first();}
                elseif($request['user_type']=='phone'){$user = User::where('phone',$request['user'])->first();}
                elseif($request['user_type']=='id'){$user = User::where('id',$request['user']+$users_gym_id)->first();}
                if ($user) {
                    $uesr_session = user_session::where('user_id',$user->id)->whereNull('leave')->first();
                    if(!$uesr_session){
                        $session = new user_session();
                        $session->user_id = $user->id;
                        $session->gym_id = $user->gym_id;
                        $result =$session->save();
                    }
                    return redirect()->back();
                }else{return redirect()->back();}
            }else{return redirect('/login');}
        }
    }

    public function leave_search(User_SearchRequest $request)
    {  
        if (auth::check()) {
            if (auth::check()) {
                $users_gym_id=Auth::user()->gym_id*10000;
                if($request['user_type']=='name'){$user = User::where([['name',$request['user']],['gym_id',Auth::user()->gym_id]])->first();}
                elseif($request['user_type']=='phone'){$user = User::where('phone',$request['user'])->first();}
                elseif($request['user_type']=='id'){$user = User::where('id',$request['user']+$users_gym_id)->first();}
                if ($user) {
                    $uesr_session = user_session::where('user_id',$user->id)->whereNull('leave')->first();
                    if($uesr_session){
                    $session = user_session::where('user_id',$user->id)->whereNull('leave')->first();
                    $session->leave = Carbon::now()->format('Y-m-d H:i');
                    $result =$session->save();
                    }
                    return redirect()->back();
                }else{return redirect()->back();}
            }else{return redirect('/login');}
        }
    }


}
