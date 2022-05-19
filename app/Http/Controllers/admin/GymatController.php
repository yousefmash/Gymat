<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GYM;
use App\Models\User;
use App\Models\gym_Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GymatController extends Controller
{
    public function index()
    {   
        if (auth::check()){
            $gymname='admin';
            $gymat = Gym::get();
            foreach($gymat as $gym){
                if ($gym->logo) {
                    $gym->logo = env('APP_URL').'/'.'storage/media/gym/'.$gym->logo;
                }
            }
            $gym_packages = gym_Package::get();
            return view('gymat.dashboard')->with("gym_name", $gymname)->with("gymat", $gymat)->with("gym_packages", $gym_packages);

        }else{return redirect('/login');}
    }

    public function store(Request $request)
    {   
        $gymname='admin';
        $gym = new GYM();
        $gym->name = $request['name'];
        $gym->phone = $request['phone'];
        $gym->gym_package_id = $request['gym_package_id'];
        $gym->user_id = auth::user()->id;
        $result =$gym->save();

        return redirect()->back();
    }

    public function edit($id)
    {   
        if (auth::check()){
            $gymname='admin';
            $gym = Gym::where('gym.id',$id)
            ->leftJoin('users', 'gym.user_id', '=', 'users.id')
            ->select('gym.*', 'users.name as user_name')
            ->first();
            if ($gym->logo) {
                $gym->logo = env('APP_URL').'/'.'storage/media/gym/'.$gym->logo;
            }
            $gym_packages = gym_Package::get();
            return view('gymat.edit-gym')->with("gym_name", $gymname)->with('gym',$gym)->with('gym_packages',$gym_packages);
        }else{return redirect('/login');}

    }

    public function update(Request $request , $id)
    {  
        $gymname='admin';
        $gym = GYM::where('id',$id)->first();
        if ($request['logo']) {
            /*  Storage image  */
            $logo = $request->file('logo');
            $path = 'media/gym/';
            $name = time()+rand(1,10000000).'.'.$logo->getClientOriginalExtension();
            Storage::disk('public')->put($path.$name , file_get_contents($logo));
            $status = Storage::disk('public')->exists($path.$name);
        }else{$status=false;}
        if ($status) {
            $gym->logo = $name;
        }
        if ($request['name']) {
            $gym->name = $request['name'];
        }
        if ($request['phone']) {
            $gym->phone = $request['phone'];
        }
        if ($request['address']) {
            $gym->address = $request['address'];
        }
        if ($request['gym_package_id']) {
            $gym->gym_package_id = $request['gym_package_id'];
        }
        $result =$gym->save();

        return redirect()->back();
    }


    public function destroy($id)
    {   
        $result = GYM::where('id', $id)->delete();
        return redirect()->back();
    }


}
