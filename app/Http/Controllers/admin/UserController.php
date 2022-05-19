<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GYM;
use App\Models\User;
use App\Models\Package;
use App\Models\user_wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index($gymname)
    {   
        if (auth::check()){
            $users_gym_id=Auth::user()->gym_id*10000;
            $arr['user'] = User::whereBetween('users.id', [$users_gym_id, $users_gym_id+10000])
                                ->leftJoin('packages', 'users.package_id', '=', 'packages.id')
                                ->leftJoin('jobs', 'users.job_id', '=', 'jobs.id')
                                ->select('users.*', 'packages.name as package_name','jobs.name as job_name')
                                ->get();
            foreach( $arr['user'] as $u){
                $u->id -= $users_gym_id;
            }
            return view('users.dashboard')->with($arr)->with("gym_name", $gymname);

        }else{return redirect('/login');}
    }

    public function create($gymname)
    {   
        if (auth::check()) {
            $gym_id = auth::user()->gym_id;
            $packages = Package::where('gym_id',$gym_id)->get();
            return view('users.add-user')->with("gym_name", $gymname)->with('packages',$packages);
            }else{return redirect('/login');}
        
    }

    public function store($gymname,Request $request)
    {   
        /*-----------------------begin::get last id to add-----------------------*/
        $users_gym_id=Auth::user()->gym_id*10000;
        $get_id = user::withTrashed()->whereBetween('users.id', [$users_gym_id, $users_gym_id+10000])
        ->orderByDesc('id')
        ->select('id')
        ->first();
        $user_id = $get_id->id +1;
        /*-----------------------end::get last id to add-----------------------*/

        /*-----------------------begin::store the user-----------------------*/
        $user = new user();
        $user->id = $user_id;
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->gender = $request['gender'];
        $user->job_id =  $request['job'];
        $user->gym_id = auth::user()->gym_id;
        $result =$user->save();
        /*-----------------------end::store the user-----------------------*/
        /*-----------------------begin::store user wallet-----------------------*/
        $user_wallet = new user_wallet();
        $user_wallet->user_id = $user_id;
        $result =$user_wallet->save();
        /*-----------------------end::store user wallet-----------------------*/

        return redirect()->back();
    }

    public function edit($gymname,$id)
    {   
        if (auth::check()){
            $id += auth::user()->gym_id*10000;
            $user= user::where('users.id', $id)
                        ->leftJoin('packages', 'users.package_id', '=', 'packages.id')
                        ->select('users.*', 'packages.name as package_name')
                        ->first();
            $gym_id = auth::user()->gym_id;
            $user_wallet = user_wallet::where('user_id', $user->id)->first();
            return view('users.edit-user')->with("gym_name", $gymname)->with('user',$user)->with("total", $user_wallet->total);
        }else{return redirect('/login');}

    }

    public function update(Request $request ,$gymname, $id)
    {  
        $user = user::where('id',$id)->first();
        if ($request['name']) {
            $user->name = $request['name'];
        }
        if ($request['phone']) {
            $user->phone = $request['phone'];
        }
        $user->gender = $request['gender'];
        $user->job_id = $request['job'];
        $result =$user->save();

        return redirect()->back();
    }


    public function destroy($gymname,$id)
    {   
        $id += auth::user()->gym_id*10000;
        $result = user::where('id', $id)->delete();

        /*-----------------------begin::delete user wallet-----------------------*/
        $result = user_wallet::where('uesr_id', $id)->delete();
        /*-----------------------end::delete user wallet-----------------------*/

        return redirect()->back();
    }


}
