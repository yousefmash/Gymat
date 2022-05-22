<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\food_table;
use App\Models\GYM;
use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PackageController extends Controller
{
    public function index($gymname)
    {   
        if (auth::check()){
            $packages = Package::where('gym_id',Auth::user()->gym_id)->get();
            return view('packages.dashboard')->with('packages',$packages)->with("gym_name", $gymname);

        }else{return redirect('/login');}
    }

    public function store($gymname,Request $request)
    {   
        $package = new Package();
        $package->name = $request['name'];
        $package->price = $request['price'];
        $package->workout_days = $request['workout_days'];
        $package->duration =  $request['duration'];
        $package->fitness =  $request['fitness'];
        $package->bodybuilding =  $request['bodybuilding'];
        $package->sauna =  $request['sauna'];
        $package->steam =  $request['steam'];
        $package->food_table =  $request['food_table'];
        $package->note = $request['note'];
        $package->gym_id = Auth::user()->gym_id;

        $result =$package->save();
        
        return redirect()->back();
    }

    public function edit($gymname,$id)
    {   
        if (auth::check()){
            $package= Package::where('packages.id', $id)->first();
            $users= User::where('package_id',$package->id)->get();
            return view('packages.edit-package')->with("gym_name", $gymname)->with('package',$package)->with('users',$users);
        }else{return redirect('/login');}

    }

    public function update(Request $request ,$gymname, $id)
    {  
        $package = Package::where('id',$id)->first();
        if ($request['name']) {
            $package->name = $request['name'];
        }
        if ($request['price']) {
            $package->price = $request['price'];
        }
        if ($request['workout_days']) {
            $package->workout_days = $request['workout_days'];
        }
        if ($request['duration']) {
            $package->duration = $request['duration'];
        }
        if ($request['fitness']) {
            $package->fitness = $request['fitness'];
        }
        if ($request['bodybuilding']) {
            $package->bodybuilding = $request['bodybuilding'];
        }
        if ($request['sauna']) {
            $package->sauna = $request['sauna'];
        }
        if ($request['steam']) {
            $package->steam = $request['steam'];
        }
        if ($request['food_table']) {
            $package->food_table = $request['food_table'];
        }
        if ($request['note']) {
            $package->note = $request['note'];
        }
        $result =$package->save();

        return redirect()->back();
    }


    public function destroy($gymname,$id)
    {   
        $package = Package::where('id', $id)->first();
        $user = User::where('package_id',$package->id)->first();
        if (!$user) {
            $result = package::where('id', $id)->delete();
        }
        return redirect()->back();
    }


}
