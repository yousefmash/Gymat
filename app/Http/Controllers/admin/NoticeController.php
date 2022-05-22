<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\food_table;
use App\Models\User;
use App\Models\Package;
use App\Models\user_wallet;
use App\Models\Notice;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function index($gymname)
    {   
        if (auth::check()){
            $notices  = Notice::Join('users', 'notices.admin_id', '=', 'users.id')
            ->select('notices.*', 'users.name as admin_name')->get();
            foreach($notices as $n){
            $n->start_at= DateTime::createFromFormat("Y-m-d H:i:s", $n->start_at);
            $n->end_at= DateTime::createFromFormat("Y-m-d H:i:s", $n->end_at);
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
                    $n->target = 'مشترك رقم'.$n->user_id;
                    break;
                }
            if($n->start_at->diff($n->end_at)->days){
                dd($n->id);
            };
            }
            return view('notices.dashboard')->with("notices", $notices)->with("gym_name", $gymname);
        }else{return redirect('/login');}
    }

    public function store($gymname,Request $request)
    {   
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

    public function edit($gymname,$id)
    {   
        if (auth::check()){
            $id += auth::user()->gym_id*10000;
            $user= user::where('users.id', $id)
            ->leftJoin('packages', 'users.package_id', '=', 'packages.id')
                        ->select('users.*', 'packages.name as package_name')
                        ->first();
            $gym_id = auth::user()->gym_id;
            $user_wallet = user_wallet::where('user_id', $user->id)->first();
            return view('users.edit-user')->with("gym_name", $gymname)->with('user',$user)->with("total", $user_wallet->total);
        }else{return redirect('/login');}

    }

    public function update(Request $request ,$gymname, $id)
    {  
        $user = user::where('id',$id)->first();
        if ($request['name']) {
            $user->name = $request['name'];
        }
        if ($request['phone']) {
            $user->phone = $request['phone'];
        }
        $user->gender = $request['gender'];
        $user->job_id = $request['job'];
        $result =$user->save();

        return redirect()->back();
    }


    public function destroy($gymname,$id)
    {   
        $result = notice::where('id', $id)->delete();

        return redirect()->back();
    }


}
