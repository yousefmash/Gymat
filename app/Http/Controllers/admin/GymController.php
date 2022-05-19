<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GYM;
use App\Models\gym_work_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class GymController extends Controller
{
    public function edit($gymname,$id)
    {   
        if (auth::check()){
            $gym= GYM::where('gym.id', $id)
                        ->leftJoin('gym_packages', 'gym.gym_package_id', '=', 'gym_packages.id')
                        ->select('gym.*', 'gym_packages.name as package_name')
                        ->first();
            $gym->logo = env('APP_URL').'/'.'storage/media/gym/'.$gym->logo;
            $men_table = gym_work_time::where([
                ['gym_id', '=', $id],
                ['gender','men']],)->first();
            $women_table = gym_work_time::where([
                ['gym_id', '=', $id],
                ['gender','women']],)->first();
            return view('gym.edit-gym')->with("gym_name", $gymname)->with('gym',$gym)->with('men_table',$men_table)->with('women_table',$women_table);
        }else{return redirect('/login');}

    }

    public function update(Request $request ,$gymname, $id)
    {  
        $gym = GYM::where('id',$id)->first();
        if ($request['logo']) {
            /*  Storage image  */
            $logo = $request->file('logo');
            $path = 'media/gym/';
            $name = time()+rand(1,10000000).'.'.$logo->getClientOriginalExtension();
            Storage::disk('public')->put($path.$name , file_get_contents($logo));
            $status = Storage::disk('public')->exists($path.$name);
        }
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
        $result =$gym->save();

        return redirect()->back();
    }
    public function update_time(Request $request ,$gymname, $id)
    {  
        $gym = gym_work_time::where([
            ['gym_id', '=', $id],
            ['gender',$request['type']]],)->first();
        if(!$gym){
            $gym = new gym_work_time();
            $gym->gym_id = $id;
        }
        $sat_f =$request['f_in_time_sat'].'|'.$request['f_out_time_sat'];
        $sun_f =$request['f_in_time_sun'].'|'.$request['f_out_time_sun'];
        $mon_f =$request['f_in_time_mon'].'|'.$request['f_out_time_mon'];
        $tue_f =$request['f_in_time_tue'].'|'.$request['f_out_time_tue'];
        $wed_f =$request['f_in_time_wed'].'|'.$request['f_out_time_wed'];
        $thu_f =$request['f_in_time_thu'].'|'.$request['f_out_time_thu'];
        $fri_f =$request['f_in_time_fri'].'|'.$request['f_out_time_fri'];

        $sat_l =$request['l_in_time_sat'].'|'.$request['l_out_time_sat'];
        $sun_l =$request['l_in_time_sun'].'|'.$request['l_out_time_sun'];
        $mon_l =$request['l_in_time_mon'].'|'.$request['l_out_time_mon'];
        $tue_l =$request['l_in_time_tue'].'|'.$request['l_out_time_tue'];
        $wed_l =$request['l_in_time_wed'].'|'.$request['l_out_time_wed'];
        $thu_l =$request['l_in_time_thu'].'|'.$request['l_out_time_thu'];
        $fri_l =$request['l_in_time_fri'].'|'.$request['l_out_time_fri'];
        if(!$request['holiday_sat']){
            if(!$request['full_time_sat']){
                if($sat_f != "|"){$gym->sat_f = $sat_f;}
                if($sat_l != "|"){$gym->sat_l = $sat_l;}
                
            }else{
                if($sat_f != "|"){$gym->sat_f = $sat_f;}
            }
        }
        if(!$request['holiday_sun']){
            if(!$request['full_time_sun']){
                if($sun_f != "|"){$gym->sun_f = $sun_f ;}
                if($sun_l != "|"){$gym->sun_l = $sun_l ;}
            }else{
                if($sun_f != "|"){$gym->sun_f = $sun_f ;}
            }
        }
        if(!$request['holiday_mon']){
            if(!$request['full_time_mon']){
                if($mon_f != "|"){$gym->mon_f = $mon_f ;}
                if($mon_l != "|"){$gym->mon_l = $mon_l ;}
            }else{
                if($mon_f){$gym->mon_f = $mon_f ;}
            }
        }
        if(!$request['holiday_tue']){
            if(!$request['full_time_tue']){
                if($tue_f != "|"){$gym->tue_f = $tue_f ;}
                if($tue_l != "|"){$gym->tue_l = $tue_l ;}
            }else{
                if($tue_f != "|"){$gym->tue_f = $tue_f ;}
            }
        }
        if(!$request['holiday_wed']){
            if(!$request['full_time_wed']){
                if($wed_f != "|"){$gym->wed_f = $wed_f ;}
                if($wed_l != "|"){$gym->wed_l = $wed_l ;}
            }else{
                if($wed_f != "|"){$gym->wed_f = $wed_f ;}
            }
        }
        if(!$request['holiday_thu']){
            if(!$request['full_time_thu']){
                if($thu_f != "|"){$gym->thu_f = $thu_f ;}
                if($thu_l != "|"){$gym->thu_l = $thu_l ;}
            }else{
                if($thu_f != "|"){$gym->thu_f = $thu_f ;}
            }
        }
        if(!$request['holiday_fri']){
            if(!$request['full_time_fri']){
                if($fri_f != "|"){$gym->fri_f = $fri_f ;}
                if($fri_l != "|"){$gym->fri_l = $fri_l ;}

            }else{
                if($fri_f != "|"){$gym->fri_f = $fri_f ;}
            }
        }
        $gym->gender = $request['type'];
        $result =$gym->save();
        return redirect()->back();

    }


}
