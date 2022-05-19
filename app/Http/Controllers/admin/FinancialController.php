<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contract;
use App\Models\food_table;
use App\Models\GYM;
use App\Models\User;
use App\Models\movement;
use App\Models\Package;
use App\Models\user_wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FinancialController extends Controller
{
    public function index($gymname)
    {   
        if (auth::check()){
            $arr['movements'] = movement::where('movements.gym_id', Auth::user()->gym_id)
                                ->leftJoin('users', 'movements.user_id', '=', 'users.id')
                                ->select('movements.*', 'users.name as user_name')
                                ->get();
            $total = ['withdraw' => 0, 'deposit' => 0,'sum_withdraw' => 0, 'sum_deposit' => 0, 'sum'=> 0];
            foreach($arr['movements'] as $m){
                if ($m->movement_type == 'withdraw'){
                    $m->type = 'صرف';
                    $m->system_note = 'صرف ملبغ '.$m->value.'₪ من قبل {'.$m->admin_name.'} , لصالح '.$m->user_name;
                    $total['withdraw'] -= $m->value;
                    $total['sum_withdraw'] -= $m->value; 
                } elseif ($m->movement_type == 'deposit'){ 
                    $m->type = 'إيداع';
                    $m->system_note = 'إيداع ملبغ '.$m->value.'₪ من قبل {'.$m->admin_name.'} , لصالح '.$m->user_name;
                    $total['deposit'] += $m->value;
                    $total['sum_deposit'] += $m->value; 
                }elseif ($m->movement_type == 'collect'){ 
                    $m->type = 'ترحيل';
                    $m->system_note = 'ترحيل ملبغ '.$m->value.'₪ من قبل {'.$m->admin_name.'}';
                    $total['sum'] -= $m->value;
                    $total['deposit'] = 0;
                    $total['withdraw'] = 0; 
                }
                }
                $total['sum'] += $total['sum_deposit']+$total['sum_withdraw'];
                return view('financial.dashboard')->with($arr)->with("gym_name", $gymname)->with("total", $total);

        }else{return redirect('/login');}
    }

    public function store_receipt($gymname,Request $request)
    {   
        if (auth::check()) {
            $users_gym_id=Auth::user()->gym_id*10000;
            if($request['user_type']=='name'){$user = User::where([['name',$request['user']],['gym_id',Auth::user()->gym_id]])->select('id')->first();}
            elseif($request['user_type']=='phone'){$user = User::where('phone',$request['user'])->select('id')->first();}
            elseif($request['user_type']=='id'){$user = User::where('id',$request['user']+$users_gym_id)->select('id')->first();}
            if ($user) {
                $receipt = new movement();
                $receipt->receipt_num = $request['receipt_num'];
                $receipt->user_id = $user->id;
                $receipt->admin_name = Auth::user()->name;
                $receipt->movement_type = $request['receipt_type'];
                $receipt->value = $request['value'];
                $receipt->gym_id = Auth::user()->gym_id;
                $receipt->note = $request['note'];
                $result =$receipt->save();

                $user_wallet = user_wallet::where('user_id', $user->id)->first();
                if ($request['receipt_type'] == 'deposit'){$user_wallet->total +=  $request['value'];}
                if ($request['receipt_type'] =='withdraw'){$user_wallet->total -=  $request['value'];}
                $result =$user_wallet->save();
                
            }

            return redirect()->back();
            }else{return redirect('/login');}
        
    }

    public function update_receipt($gymname,Request $request,$id)
    {   
        if (auth::check()){
            $receipt= movement::where('id', $id)->first();
            $receipt->receipt_num = $request['receipt_num'];
            $result =$receipt->save();
            return redirect()->back();
        }else{return redirect('/login');}

        return redirect()->back();
    }

    public function collect_amount($gymname,Request $request)
    {   
        if (auth::check()) {
                $receipt = new movement();
                $receipt->admin_name = Auth::user()->name;
                $receipt->movement_type = 'collect';
                $receipt->value = $request['receipt_num'];
                $receipt->note = $request['note'];
                $receipt->gym_id = Auth::user()->gym_id;
                $result =$receipt->save();
            return redirect()->back();
            }else{return redirect('/login');}
    }

    public function record_Search($gymname,Request $request)
    {  
        if (auth::check()) {
            if (auth::check()) {
                $users_gym_id=Auth::user()->gym_id*10000;
                if($request['user_type']=='name'){$user = User::where([['name',$request['user']],['gym_id',Auth::user()->gym_id]])->first();}
                elseif($request['user_type']=='phone'){$user = User::where('phone',$request['user'])->first();}
                elseif($request['user_type']=='id'){$user = User::where('id',$request['user']+$users_gym_id)->first();}
                if ($user) {
                    return redirect($gymname.'/'.'financial-record/'.$user->id);
                }else{return redirect()->back();}
        }else{return redirect('/login');}
    }}


    public function financial_record($gymname,$id)
    {  
        if (auth::check()) {
            $user = User::where('id',$id)->first();
            $arr['movements'] = movement::where('movements.user_id', $user->id)->get();
            $user_wallet = user_wallet::where('user_id', $user->id)->first();

            foreach($arr['movements'] as $m){
                if ($m->movement_type == 'withdraw'){
                    $m->type = 'صرف';
                } elseif ($m->movement_type == 'deposit'){ 
                    $m->type = 'إيداع';
                }
                }
            return view('financial.record')->with($arr)->with('user',$user)->with("gym_name", $gymname)->with("total", $user_wallet->total);
        }else{return redirect('/login');}
    }

    
    public function contract_Search($gymname,Request $request)
    {  
        if (auth::check()) {
            if (auth::check()) {
                $users_gym_id=Auth::user()->gym_id*10000;
                if($request['user_type']=='name'){$user = User::where([['name',$request['user']],['gym_id',Auth::user()->gym_id]])->first();}
                elseif($request['user_type']=='phone'){$user = User::where('phone',$request['user'])->first();}
                elseif($request['user_type']=='id'){$user = User::where('id',$request['user']+$users_gym_id)->first();}
                if ($user) {
                    return redirect($gymname.'/'.'contract/'.$user->id);
                }else{return redirect()->back();}
        }else{return redirect('/login');}
    }}


    public function contract($gymname,$id)
    {  
        if (auth::check()) {
            $user = User::where('id',$id)->first();
            $arr['movements'] = movement::where('movements.user_id', $user->id)->get();
            $packages = Package::where('gym_id',Auth::user()->gym_id)->get();
            $user_wallet = user_wallet::where('user_id', $user->id)->first();
            $coachs = User::where([['gym_id',$user->gym_id],['job_id',5]])->get();
            foreach($arr['movements'] as $m){
                if ($m->movement_type == 'withdraw'){
                    $m->type = 'صرف';
                } elseif ($m->movement_type == 'deposit'){ 
                    $m->type = 'إيداع';
                }
                }
            foreach($packages as $p){
                if ($p->duration%30 === 0){
                    $p->duration =($p->duration/30).'شهر';}
            elseif($p->duration%365 === 0){
                $p->duration=($p->duration/365).'سنة';}
            else{
                $p->duration=$p->duration.'يوم';
            }}
            return view('financial.contract')->with($arr)->with('user',$user)->with("packages", $packages)->with("coachs", $coachs)->with("gym_name", $gymname)->with("total", $user_wallet->total);
        }else{return redirect('/login');}
    }

    public function store_contract($gymname,$id,Request $request)
    {
        if (auth::check()) {
            $contract = new contract();
            $contract->user_id = $id;
            $contract->package_id = $request['package'];
            $contract->package_price = $request['package_value'];
            $contract->start_at = $request['start_at'];
            $contract->coach_id = $request['coach'];
            $contract->discount = $request['discount'];
            $contract->note = $request['note'];
            $result =$contract->save();        
            $package= Package::where('id',$contract->package_id)->first();
            if ($package->food_table == 1) {
                $food_table= food_table::where('user_id',$id)->first();
                if (!$food_table) {
                    $food_table = new food_table();
                    $food_table->user_id =  $id;
                }
                $food_table->coach_id = $request['coach'];
                $result =$food_table->save();        
            }

            $user_wallet = user_wallet::where('user_id', $id)->first();
            $total = $request['package_value']-$request['discount'];
            $user_wallet->total -=  $total;
            #$result =$user_wallet->save();
            return redirect($gymname.'/dashboard');
        }else{return redirect('/login');}
    }
}
