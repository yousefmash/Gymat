<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\store_Food_tableRequest;
use App\Http\Requests\update_Food_tableRequest;
use App\Http\Requests\User_SearchRequest;
use App\Models\food_table;
use App\Models\meal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Food_tableController extends Controller
{
    public function index()
    {
        if (auth::check()){
        $dits=['active'=>0,'new'=>0,'check'=>0]; 

        $new_tables = food_table::where([['food_table.coach_id',Auth::user()->id],['food_table.state',0]])
                        ->leftJoin('users', 'food_table.user_id', '=', 'users.id')
                        ->select('food_table.*', 'users.name as user_name')->get();
        $dits['new']=count($new_tables);               
        $check_table = food_table::where([['food_table.coach_id',Auth::user()->id],['food_table.state',1]])->get();
        $dits['active']=count($check_table);
        foreach($check_table as $c){
            $diffInDays =  Carbon::now()->diffInDays($c->updated_at, time());
            if ($diffInDays >= $c->days) {
                $c->state = 2;
                $result =$c->save();
                $dits['active'] -= 1;
            }
        }
        $tables_to_check = food_table::where([['food_table.coach_id',Auth::user()->id],['food_table.state',2]])
        ->leftJoin('users', 'food_table.user_id', '=', 'users.id')
        ->select('food_table.*', 'users.name as user_name')->get();
        $dits['check']=count($tables_to_check);               
        return view('diet.food_table.dashboard')->with('dits',$dits)->with('tables_to_check',$tables_to_check)
        ->with('new_tables',$new_tables);
        }else{return redirect('/login');}
    }
    
    public function store(store_Food_tableRequest $request,$id)
    {
        $food_table = food_table::where('user_id',$id)->first();

        $food_table->days = $request['days'];
        $food_table->note = $request['note'];
        if ($food_table->days >0 and $food_table->meals) {
            $food_table->state = 1;
        }
        $result =$food_table->save();

        return redirect()->back();
    }
    
    public function edit($gymname,$id)
    {
        if (auth::check()){
            $food_table_meals= [];
            $sum_calories = 0;
            $user= user::where('id', $id)->first();
            $food_table= food_table::where('user_id', $id)->first();
            foreach (explode('|',$food_table->meals) as $f){
                if ($f) {
                    $meal = meal::where('id', $f)->first();
                    $sum_calories += $meal->calories ;
                    array_push($food_table_meals,$meal);               
                } 
            }
            $meals = meal::where('coach_id',Auth::user()->id)->get();
            return view('diet.food_table.edit-food_table')
            ->with('user',$user)->with('food_table',$food_table)->with('meals',$meals)
            ->with('food_table_meals',$food_table_meals)->with('sum_calories',$sum_calories);
        }else{return redirect('/login');}
    }

    public function update($gymname,update_Food_tableRequest $request , $id)
    {  
        $food_table = food_table::where('user_id',$id)->first();
            if (!$food_table->meals) {
                $food_table->meals += $request['add_mael'];
            }else{
                $food_table->meals = $food_table->meals .'|'.$request['add_mael'];
            }
        if ($food_table->days >0 and $food_table->meals) {
            $food_table->state = 1;
        }
        
        $result =$food_table->save();

        return redirect()->back();
    }
    public function food_table_search(User_SearchRequest $request)
    {  
        if (auth::check()) {
            if (auth::check()) {
                $users_gym_id=Auth::user()->gym_id*10000;
                if($request['user_type']=='name'){$user = User::where([['name',$request['user']],['gym_id',Auth::user()->gym_id]])->first();}
                elseif($request['user_type']=='phone'){$user = User::where('phone',$request['user'])->first();}
                elseif($request['user_type']=='id'){$user = User::where('id',$request['user']+$users_gym_id)->first();}
                if ($user) {
                    $food_table = food_table::where('food_table.user_id', $user->id)->first();
                    if ($food_table) {
                        return redirect(Cookie::get('gym_name').'/'.'diet/food-table/'.$user->id);
                    }else{return redirect()->back();}                    
                }else{return redirect()->back();}
        }else{return redirect('/login');}
    }}
    public function destroy ($gymname,$user_id,$meal_num)
    {
        $food_table = food_table::where('user_id', $user_id)->first();
        $meals = explode('|',$food_table->meals);
        unset($meals[$meal_num]);
        $new_meals ='';
        foreach ($meals as $m) {
            $new_meals = $new_meals.$m.'|';
        }
        $new_meals = substr($new_meals, 0, -1);
        $food_table->meals = $new_meals;
        $result =$food_table->save();
        return redirect()->back();
    }

}