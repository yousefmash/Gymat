<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\profile_updateRequest;
use App\Http\Requests\UserRequest;
use App\Models\contract;
use App\Models\food_table;
use App\Models\GYM;
use App\Models\User;
use App\Models\Package;
use App\Models\user_session;
use App\Models\user_wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index()
    {   
        if (auth::check()){
            $users_gym_id=Auth::user()->gym_id*10000;
            $arr['user'] = User::whereBetween('users.id', [$users_gym_id, $users_gym_id+10000])
                                ->leftJoin('jobs', 'users.job_id', '=', 'jobs.id')
                                ->select('users.*', 'jobs.name as job_name')
                                ->get();
            foreach( $arr['user'] as $u){
                $u->id -= $users_gym_id;
            }
            return view('users.dashboard')->with($arr);

        }else{return redirect('/login');}
    }

    public function create($gymname)
    {   
        if (auth::check()) {
            $gym_id = auth::user()->gym_id;
            $packages = Package::where('gym_id',$gym_id)->get();
            return view('users.add-user')->with('packages',$packages);
            }else{return redirect('/login');}
        
    }

    public function store(UserRequest $request)
    {   
        /*-----------------------begin::get last id to add-----------------------*/
        $users_gym_id=Auth::user()->gym_id*10000;
        $get_id = user::withTrashed()->whereBetween('users.id', [$users_gym_id, $users_gym_id+10000])
        ->orderByDesc('id')
        ->select('id')
        ->first();
        $user_id = $get_id->id +1;
        /*-----------------------end::get last id to add-----------------------*/

        /*-----------------------begin::Check if the gym exceeds the limit of users-----------------------*/
        $users_limit = GYM::where('gym.id',Auth::user()->gym_id)->join('gym_contracts','gym.id','gym_contracts.gym_id')
        ->leftJoin('gym_packages', 'gym_contracts.package_id', '=', 'gym_packages.id')
        ->select('gym_packages.users_number as users_limit')
        ->first()->users_limit;

        $users_count = user::where('gym_id',Auth::user()->gym_id)->count();
    
        if ($users_limit <= $users_count) {
            $error='لقد تخطيت الحد المسموح من إضافة الزبائن';
            return redirect()->back()->withErrors($error);
        }
        /*-----------------------end::Check if the gym exceeds the limit of users-----------------------*/

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
            $user= user::Join('contract','users.id','contract.user_id')->where('users.id', $id)
            ->leftJoin('packages', 'contract.package_id', '=', 'packages.id')
                        ->select('users.*', 'packages.name as package_name')
                        ->first();
            if (!$user) {
                $user = user::where('users.id', $id)->first();
                $user->package_name = "غير مشترك";
            }
            $user_wallet = user_wallet::where('user_id', $user->id)->first();
            $last_session = user_session::where('user_id',  $user->id)->orderby('created_at', 'desc')->first();
            $user->age = date_diff(date_create($user->age), date_create(Carbon::now()))->format('%y');
            $contract = contract::where('contract.user_id',  $user->id)->leftJoin('packages', 'contract.package_id', '=', 'packages.id')
            ->select('contract.*', 'packages.name as package_name')->orderby('contract.created_at', 'desc')->first();
            return view('users.edit-user')->with('user',$user)->with("total", $user_wallet->total)->with('last_session',$last_session)->with('contract',$contract);
        }else{return redirect('/login');}

    }

    public function update($gymname,UserRequest $request , $id)
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
        $result = user_wallet::where('user_id', $id)->delete();
        /*-----------------------end::delete user wallet-----------------------*/

        /*-----------------------begin::delete user wallet-----------------------*/
        $result = food_table::where('user_id', $id)->delete();
        /*-----------------------end::delete user wallet-----------------------*/

        return redirect()->back();
    }
    
    public function profile($gymname)
    {
        if (auth::check()){
            $user= user::where('id', auth::user()->id)->first();
            $user_wallet = user_wallet::where('user_id', $user->id)->first();
            $last_session = user_session::where('user_id', auth::user()->id)->orderby('created_at', 'desc')->first();
            $user->age = date_diff(date_create($user->age), date_create(Carbon::now()))->format('%y');
            $contract = contract::where('contract.user_id', auth::user()->id)->leftJoin('packages', 'contract.package_id', '=', 'packages.id')
            ->select('contract.*', 'packages.name as package_name')->orderby('contract.created_at', 'desc')->first();
            return view('user-pages\profile')->with('user',$user)->with("total", $user_wallet->total)->with('last_session',$last_session)->with('contract',$contract);
        }else{return redirect('/login');}
    }
    public function delete_password($gymname,$id)
    {
        if (auth::check()){
            $user = User::where('id',$id)->first();
            $user->password = null;
            $result =$user->save();
            return redirect()->back();

        }else{return redirect('/login');}
    }
    public function reset_password($gymname,PasswordRequest $request)
    {
        if (auth::check()){
            $hash_password = Hash::make( $request['new_password']);
            $user = user::where('id',auth::user()->id)->first();
            $user->password = $hash_password;
            $result =$user->save();

            return redirect()->back();
        }else{return redirect('/login');}
    }
    public function profile_update($gymname,profile_updateRequest $request)
    {
        $user = user::where('id',auth::user()->id)->first();
        if ($request['phone']) {
            $user->phone = $request['phone'];
        }
        if ($request['age']) {
            $user->age = $request['age'];
        }
        if ($request['weight']) {
            $user->weight = $request['weight'];
        }
        $result =$user->save();

        return redirect()->back();
    }
}
