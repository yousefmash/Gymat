<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\food_table;
use App\Models\User;
use App\Models\Package;
use App\Models\user_wallet;
use App\Models\Notice;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class NoticeController extends Controller
{
    public function index()
    {   
        if (auth::check()){
            $notices  = Notice::Where('notices.gym_id', Auth::user()->gym_id)->Join('users', 'notices.admin_id', '=', 'users.id')
            ->select('notices.*', 'users.name as admin_name')->get();
            foreach($notices as $n){
                $end_at= Carbon::createFromFormat("Y-m-d H:i:s", $n->end_at)->timestamp;
                if (!$n->start_at) {
                    $start_at= $n->created_at->timestamp;
                }else{
                    $start_at= Carbon::createFromFormat('Y-m-d H:i:s', $n->start_at)->timestamp;
                }
                if($n->state == 2){
                    if($start_at-Carbon::now()->timestamp<0){
                        $n->state = 1;
                        $result =$n->save();
                        $end_at =gmdate("Y-m-d", $end_at);
                    }
                    else{
                        $end_at =gmdate("Y-m-d", $end_at);
                    }
                }elseif($n->state == 1){
                    if($end_at-Carbon::now()->timestamp<0){
                        $n->state = 0;
                        $result =$n->save();
                        $end_at ='إنتهى';
                    }else{
                        $end_at = gmdate("Y-m-d", $end_at);
                    }
                }else{
                    $end_at ='إنتهى';
                }
                $n->start_at=gmdate("Y-m-d", $start_at);
                $n->end_at=$end_at ;
                switch ($n->target) {
                    case 'all':
                        $n->target = 'للجميع';
                        break;
                    case 'will_over':
                        $n->target = 'ستنتهي فترة إشتراكهم خلال أسبوع';
                        break;
                    case 'is_over':
                        $n->target = 'إنتهى الإشتراك';
                        break;
                    case 'user':
                        $n->target = 'مشترك رقم '.$n->user_id;
                        break;
                    }
                    
                
            }
            return view('notices.dashboard')->with("notices", $notices)->with("start_at", $start_at)->with("end_at", $notices);
        }else{return redirect('/login');}
    }

    public function store($gymname,NoticeRequest $request)
    {   
        $end_at = Carbon::createFromFormat("Y-m-d", $request['end_at'])->timestamp;
        $now= Carbon::now()->timestamp;
        if ($request['start_at'] ) {
            $start_at= Carbon::createFromFormat("Y-m-d", $request['start_at'])->timestamp;
            if ($start_at-$end_at>0) {
                $error='يجب ان يكون تاريخ الإرسال قبل تاريخ الإنتهاء ';
                return redirect()->back()->withErrors($error);
            }
            if ($now-$start_at>0) {
                $state = 1;
            }else{
                $state = 2;
            }

        }else{
            if ($now-$end_at>0) {
                $error='يجب ان يكون تاريخ الإنتهاء بعد تاريخ اليوم';
                return redirect()->back()->withErrors($error);
            }else{
                $state = 1;
            }
        }
        $notice = new notice();
        $notice->title =$request['title'];
        $notice->target =$request['target'];
        $notice->content =$request['content'];
        $notice->admin_id =auth::user()->id;
        if ($request['start_at'] ) {
            $notice->start_at= $request['start_at'];
        }
        $notice->end_at= $request['end_at'];
        $notice->gym_id = auth::user()->gym_id;
        $notice->state = $state;

        if ($request['user_id'] ) {
            $notice->user_id =$request['user_id'];
        }
        $result =$notice->save();

        return redirect()->back();
    }

    public function destroy($gymname,$id)
    {   
        $result = notice::where('id', $id)->delete();

        return redirect()->back();
    }


}
