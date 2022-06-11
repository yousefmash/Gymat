<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use App\Models\food_table;
use App\Models\meal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    public function index()
    {   
        if (auth::check()){
        $meals = meal::where('coach_id',Auth::user()->id)->get();
        return view('diet.meal.dashboard')->with('meals',$meals);
        }else{return redirect('/login');}
    }
    
    public function store(MealRequest $request)
    {   
        /*-----------------------begin::store meal-----------------------*/
        $meal = new meal();
        $meal->name = $request['name'];
        $meal->calories = $request['calories'];
        $meal->details = $request['details'];
        $meal->coach_id =  auth::user()->id;
        $meal->gym_id = auth::user()->gym_id;
        $result =$meal->save();
        /*-----------------------end::store meal-----------------------*/

        return redirect()->back();
    }
    
    public function edit($gymname,$id)
    {   
        if (auth::check()){
            $meal= meal::where('id', $id)->first();
            $users = food_table::where('meals','like','%|'.$meal->id.'|%')->get();
            return view('diet.meal.edit-meal')->with('meal',$meal)->with('users',$users);
        }else{return redirect('/login');}

    }

    public function update(MealRequest $request , $id)
    {  
        $meal = meal::where('id',$id)->first();
        $meal->name = $request['name'];
        $meal->calories = $request['calories'];
        $meal->details = $request['details'];
        $result =$meal->save();

        return redirect()->back();
    }


}