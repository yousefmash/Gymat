<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class PasswordController extends Controller
{
    /**
     * Update the password for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('auth.password.account');
        
    }
    public function check_account(Request $request)
    {
        // Validate the account...
        
        $user = User::where('phone',$request['phone'])->first();
        if ($user) {
            if (!$user->password) {
                return view('auth.password.set_password')->with("id",$user->id);
            }
            else{
                $error = 'المستخدم لديه كلمة سر';
                return redirect('/login')->withErrors($error);
            } 
        }else{
            $error = 'لا يوجد مستخدم بهذا الرقم';
            return redirect('/login/password')->withErrors($error);
        }
    }
    public function set_password(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        $user->password = bcrypt($request['password']);
        $result =$user->save();
        return redirect('/login');
        
    }
    public function update(Request $request)
    {
        // Validate the new password length...
 
        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();
    }
}