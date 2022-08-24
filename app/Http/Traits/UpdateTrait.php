<?php
namespace App\http\Traits;

use App\Models\contract;
use App\Models\food_table;
use App\Models\gym_contract;
use App\Models\Notice;
use App\Models\Package;
use App\Models\updated;
use App\Models\user_session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait UpdateTrait {

    public function update (){
        $users_gym_id = Auth::user()->gym_id*10000;
        $contracts = $this->ContractsUpdate($users_gym_id);
        $Food_tables = $this->Food_tablesUpdate($users_gym_id);
        $Gym_Duration = $this->Gym_Duration();
        $NoticesUpdate = $this->NoticesUpdate();
        $User_sessionsUpdate = $this->User_sessionsUpdate();

        $updated = updated::first();
        $updated->updated_at = Carbon::now()->format("Y-m-d H:i:s");
        $result =$updated->save();

    }

    public function User_sessionsUpdate(){
        $user_sessions = user_session::where([['gym_id',Auth::user()->gym_id],['leave',null]])->get();
        foreach ($user_sessions as $user_session) {
            $user_session->leave = Carbon::now()->format("Y-m-d H:i:s");
            $result =$user_session->save();
        }
        return true;
    }
    public function NoticesUpdate(){
        $notices  = Notice::Where('notices.gym_id', Auth::user()->gym_id)->Join('users', 'notices.admin_id', '=', 'users.id')
        ->select('notices.*', 'users.name as admin_name')->get();
        foreach($notices as $n){
            $end_at= Carbon::createFromFormat("Y-m-d H:i:s", $n->end_at)->timestamp;
            if (!$n->start_at) {
                $start_at= $n->created_at->timestamp;
            }else{
                $start_at= Carbon::createFromFormat('Y-m-d H:i:s', $n->start_at)->timestamp;
            }
            if($n->state == 2 and $start_at-Carbon::now()->timestamp<0){
                $n->state = 1;
                $result =$n->save();
            }elseif($n->state == 1 and $end_at-Carbon::now()->timestamp<0){
                $n->state = 0;
                $result =$n->save();
            }
        }
        return true;
    }



    public function Gym_Duration(){
        $gym_contract = gym_contract::where([['gym_id',Auth::user()->gym_id],['state',1]])->leftJoin('gym_packages', 'gym_contracts.package_id', 'gym_packages.id')
        ->select('gym_contracts.*', 'gym_packages.duration')
        ->first();
        $diffInDays =  Carbon::now()->diffInDays($gym_contract->updated_at, time());
            if ($diffInDays+10 >= $gym_contract->duration) {
                $gym_contract->state = 0;
                $result =$gym_contract->save();
            }
            if ($diffInDays >= $gym_contract->duration) {
                $notice = new Notice();
                $notice->title ='إنتهاء مدة الإشتراك';
                $notice->content ='جيم';
                $notice->content ='سيتم توقف الخدمات بعد عشر أيام من تاريخ الإنتهاء الرجاء تجديد الإشتراك';
                $notice->user_id =Auth::user()->gym_id;
                $notice->state =1;
                $result =$notice->save();
            }
        return true;
    }

    public function Food_tablesUpdate($users_gym_id){
        $check_table = food_table::whereBetween('user_id',[$users_gym_id,($users_gym_id+9999)])->where('state',1)->get();
        foreach($check_table as $c){
            $diffInDays =  Carbon::now()->diffInDays($c->updated_at, time());
            if ($diffInDays >= $c->days) {
                $c->state = 2;
                $result =$c->save();
            }
        }
        return true;
    }

    public function ContractsUpdate($users_gym_id){
        $contracts = contract::whereBetween('user_id',[$users_gym_id,($users_gym_id+9999)])->get();
        foreach ($contracts as  $contract) {
            if (!$contract->start_at) {
                $start_at = $contract->created_at;
            }else{
                $start_at = $contract->start_at;
            }
            if ($contract->state == 2 and Carbon::createFromFormat('Y-m-d H:i:s', $start_at)<Carbon::now()->timestamp) {
                $contract->state =1 ;
                $result =$contract->save();
            }
            if ($contract->state == 1) {
                $packages = Package::where('id',$contract->package_id)->first();
                if (($packages->duration*86400)+Carbon::createFromFormat('Y-m-d H:i:s', $start_at)->timestamp < Carbon::now()->timestamp) {
                    $contract->state =0 ;
                    $result =$contract->save();
                }}
            }
            return true;
    }

}


?>