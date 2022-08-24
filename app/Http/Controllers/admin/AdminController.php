<?php

namespace App\Http\Controllers\admin;

use App\Charts\dailyfund;
use App\Charts\dailySessions;
use App\Charts\UsersSessions;
use App\Http\Controllers\Controller;
use App\Models\contract;
use App\Models\financial_balance;
use App\Models\food_table;
use App\Models\GYM;
use App\Models\movement;
use App\Models\Notice;
use App\Models\Package;
use App\Models\updated;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Traits\UpdateTrait;
use App\Models\user_session;
use App\Models\user_wallet;

class AdminController extends Controller
{

    use UpdateTrait;
    public function index(dailyfund $dailyfund,dailySessions $dailySessions , UsersSessions $UsersSessions)
    {
        if (auth::check()){
            if (updated::where('id',1)->first()->updated_at->timestamp+(3600*23) < Carbon::now()->timestamp) {
               $this->update();
            }
        
            if (Auth::user()->job_id==1) {
                $contract = contract::where([['user_id', Auth::user()->id],['state', 1]])->first();
                if ($contract) {
                    if (!$contract->start_at) {
                        $start_at = $contract->created_at;
                    }else{
                        $start_at = $contract->start_at;
                    }
                    $packages = Package::where('id',$contract->package_id)->first();
                    if (($packages->duration*86400)+Carbon::createFromFormat('Y-m-d H:i:s', $start_at)->timestamp < Carbon::now()->timestamp) {
                        $contract->state =0 ;
                        $result =$contract->save();
                    }

                }
                $notices  = Notice::Where([['notices.gym_id', Auth::user()->gym_id],['notices.state', 1]])->Join('users', 'notices.admin_id', '=', 'users.id')
                ->select('notices.*', 'users.name as admin_name')->get();
                $contract = contract::where([['user_id', Auth::user()->id],['state', 1]])->first();
                if ($contract) {
                    if (!$contract->start_at) {
                        $start_at = $contract->created_at->format('d/m/Y');
                    }else{
                        $start_at = $contract->start_at->format('d/m/Y');
                    }
                    if ($contract->coach_id) {
                        $coach_id = $contract->coach_id;
                            $coach = User::where('id',$coach_id)->first()->name;
                    }else{
                        $coach = null;
                    }
                    $package = Package::where('id',$contract->package_id)->first();
                }else{
                    $start_at = null;
                    $coach = null;
                    $package = null;
                }
                $wallet = user_wallet::where('user_id',Auth::user()->id)->first();
                $arrival = user_session::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
                if ($arrival) {
                    $arrival_at = $arrival->created_at->format('d/m/Y');
                }else{
                    $arrival_at = null;
                }
                //get last 3 movements
                $latest_movements =  movement::latest()->take(3)->where('user_id',Auth::user()->id)->get();
                return view('user-pages.dashboard')->with('notices',$notices)
                                                ->with('start_at',$start_at)
                                                ->with('wallet',$wallet->total)
                                                ->with('arrival',$arrival_at)
                                                ->with('coach',$coach)
                                                ->with('package',$package)
                                                ->with('latest_movements',$latest_movements);
            }
            //get last 3 movements
            $latest_movements =  movement::latest()->take(3)->leftJoin('users', 'movements.user_id', '=', 'users.id')
            ->select('movements.*', 'users.name as user_name')
            ->get();
            // get users count
            $users_gym_id=Auth::user()->gym_id*10000;
            $usersnum = User::whereBetween('id', [$users_gym_id, $users_gym_id+10000])->count();
            $inactive_users = 0;

            $men_users = User::whereBetween('id', [$users_gym_id, $users_gym_id+10000])->where([['gender',"ذكر"],['job_id',1]])->count();
            $women_users = User::whereBetween('id', [$users_gym_id, $users_gym_id+10000])->where([['gender',"أنثى"],['job_id',1]])->count();
            //get financial data
            $arr['movements'] = movement::where('movements.gym_id', Auth::user()->gym_id)
                                ->leftJoin('users', 'movements.user_id', '=', 'users.id')
                                ->select('movements.*', 'users.name as user_name')
                                ->orderBy('created_at', 'DESC')
                                ->get();
            $total = ['withdraw' => 0, 'deposit' => 0];
            
            foreach($arr['movements'] as $m){
                if ($m->movement_type == 'withdraw'){
                    $m->type = 'صرف';
                    $m->system_note = 'صرف ملبغ '.$m->value.'₪ من قبل {'.$m->admin_name.'} , لصالح '.$m->user_name;
                    $total['withdraw'] += $m->value;
                } elseif ($m->movement_type == 'deposit'){ 
                    $m->type = 'إيداع';
                    $m->system_note = 'إيداع ملبغ '.$m->value.'₪ من قبل {'.$m->admin_name.'} , لصالح '.$m->user_name;
                    $total['deposit'] += $m->value;
                }elseif ($m->movement_type == 'collect'){ 
                   break;
                }
                }

            $gym_balance=financial_balance::where('gym_id',Auth::user()->gym_id)->first()->balance;

            $coach = user::Where([['gym_id', Auth::user()->gym_id],['job_id',3]])
                        ->orWhere([['gym_id', Auth::user()->gym_id],['job_id',5]])
                        ->get();
            foreach ($coach as $c) {
                $coach_users[$c->id]=contract::Where([['coach_id', $c->id],['state',1]])->count();
                $coach_new_food_table[$c->id]=food_table::where([['food_table.coach_id',$c->id],['food_table.state',0]])->count();
                $coach_edit_food_table[$c->id]=food_table::where([['food_table.coach_id',$c->id],['food_table.state',2]])->count();
            }
            $notices = Notice::Where([['notices.gym_id', Auth::user()->gym_id],['notices.state',1]])->Join('users', 'notices.admin_id', '=', 'users.id')
            ->select('notices.*', 'users.name as admin_name')->latest()->take(3)->get();
            $active_notices =  Notice::Where([['gym_id', Auth::user()->gym_id],['state',1]])->count();
            $waiting_notices =  Notice::Where([['gym_id', Auth::user()->gym_id],['state',2]])->count();
            return view('dashboard\dashboard')->with($arr)->with("total", $total)
                                            ->with("gym_balance", $gym_balance)
                                            ->with('men_users',$men_users)
                                            ->with('women_users',$women_users)
                                            ->with('inactive_users',$inactive_users)
                                            ->with('usersnum',$usersnum)
                                            ->with('latest_movements',$latest_movements)
                                            ->with('coach',$coach)
                                            ->with('coach_users',$coach_users)
                                            ->with('coach_new_food_table',$coach_new_food_table)
                                            ->with('coach_edit_food_table',$coach_edit_food_table)
                                            ->with('notices',$notices)
                                            ->with('active_notices',$active_notices)
                                            ->with('waiting_notices',$waiting_notices)
                                            ->with('dailyfund' , $dailyfund->build())
                                            ->with('UsersSessions',$UsersSessions->build())
                                            ->with('dailySessions',$dailySessions->build());
        }else{return redirect('/login');}
    }  
    
}
