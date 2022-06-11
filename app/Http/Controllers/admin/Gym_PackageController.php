<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gym_PackagesRequest;
use App\Models\food_table;
use App\Models\GYM;
use App\Models\gym_package;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;


class Gym_PackageController extends Controller
{
    public function index()
    {
        if (auth::check()){
            $packages = gym_package::all();
            return view('gym_packages.dashboard')->with('packages',$packages);
        }else{return redirect('/login');}
    }

    public function store(Gym_PackagesRequest $request)
    {   
        $package = new gym_package();
        $package->name = $request['name'];
        $package->users_number = $request['users_number'];
        $package->duration = $request['duration'];
        $package->price =  $request['price'];
        $package->note =  $request['note'];
        $result =$package->save();
        
        return redirect()->back();
    }

    public function edit($id)
    {   
        if (auth::check()){
            $package= gym_package::where('id', $id)->first();
            $gymat= gym::where('gym_package_id',$package->id)->get();
            return view('gym_packages.edit-package')->with('package',$package)->with('gymat',$gymat);
        }else{return redirect('/login');}

    }

    public function update(Gym_PackagesRequest $request , $id)
    {  
        $package = gym_package::where('id',$id)->first();
        $package->name = $request['name'];
        $package->users_number = $request['users_number'];
        $package->duration = $request['duration'];
        $package->price = $request['price'];
        $package->note = $request['note'];
        $result =$package->save();

        return redirect()->back();
    }


    public function destroy($id)
    {   
        $package = gym_package::where('id', $id)->first();
        $gym = gym::where('gym_package_id',$package->id)->first();
        if (!$gym) {
            $result = gym_package::where('id', $id)->delete();
        }
        return redirect()->back();
    }


}
