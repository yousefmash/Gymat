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
            $notices  = Notice::Join('users', 'notices.admin_id', '=', 'users.id')
            ->select('notices.*', 'users.name as admin_name')->get();
            foreach($notices as $n){
                if (!$n->start_at) {
                    $n->start_at= gmdate("Y-m-d", $n->created_at->timestamp);
                }else{
                    $n->start_at= DateTime::createFromFormat('Y-m-d H:i:s', $n->start_at)->format('Y-m-d');
                }
                $n->end_at= Carbon::createFromFormat("Y-m-d H:i:s", $n->end_at)->timestamp;
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
                    if($n->end_at-Carbon::now()->timestamp<0){
                        $n->end_at = 'إنتهى';
                        $n->active = 0;
                    }else{
                        $n->end_at =gmdate("Y-m-d", $n->end_at);
                        $n->active = 1;
                    };
                
            }
            return view('notices.dashboard')->with("notices", $notices);
        }else{return redirect('/login');}
    }

    public function store(NoticeRequest $request)
    {   
            dd($request['x']);
        $notice = new notice();
        $notice->title =$request['title'];
        $notice->target =$request['target'];
        $notice->content =$request['content'];
        $notice->admin_id =auth::user()->id;
        $notice->end_at= $request['end_at'];
        if ($request['start_at'] ) {
            $notice->start_at= $request['start_at'];
        }
        if ($request['user_id'] ) {
            $notice->user_id =$request['user_id'];
        }
        $result =$notice->save();

        return redirect()->back();
    }

    public function destroy($id)
    {   
        $result = notice::where('id', $id)->delete();

        return redirect()->back();
    }


}
