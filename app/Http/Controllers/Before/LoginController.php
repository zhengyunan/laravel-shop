<?php

namespace App\Http\Controllers\Before;
use App\Models\Before\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class LoginController extends Controller
{
    public function create(){
        return view("Before.login.login");
    }

    public function dologin(Request $req){
        $zhaohao = $req->zhaohao;
        $isEmail = '/^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/'; 
        $isMob="/^1[34578]{1}\d{9}$/";
        if(preg_match($isEmail,$zhaohao)){
            $user = Users::where('email',$zhaohao)->first();

            if($user){
                if(Hash::check($req->password,$user->password)){
                //把用户经常用的存在session中
                session([
                    'user_id'=>$user->id,
                ]);
                // dd(456);
                return redirect()->route('before_index');
            }else{
                return back()->withErrors('密码或邮箱错误');
            }
            }
        }elseif(preg_match($isMob,$zhaohao)){
            $user = Users::where('tel',$zhaohao)->first();
            if($user){
                if(Hash::check($req->password,$user->password)){
                    //把用户经常用的存在session中
                    // dd(123);
                    session([
                        'user_id'=>$user->id,
                    ]);
                    // dd(123);
                    return redirect()->route('before_index');
                }else{
                    return back()->withErrors('密码或电话号错误');
                }
            }
        }else{
            return back()->withErrors('账号错误');
        }
    }

    public function loginout(){
        session()->flush();
        return redirect()->route('user_login');
    }
}
