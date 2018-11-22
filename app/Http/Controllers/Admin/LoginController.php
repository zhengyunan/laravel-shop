<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //
    public function index(){
        return view("Admin.Login.login");
    }
    
    public function dologin(Request $req){
        // $admin = new Admin;
        // $user = $admin->getAdmin();
        $user = Admin::where('admin_name',$req->admin_name)->first();
        // dd($user);
    //    dd($req->admin_name);
        if($user){

            if(Hash::check($req->admin_password,$user->admin_password)){
                //把用户经常用的存在session中
                session([
                    'id'=>$user->id,
                    'admin_name'=>$user->admin_name,
                ]);
              
                $data = new Admin;
                $url = $data->getUrl_path(session('id'));
                    // dd($url);
                session(['url'=>$url]);
                return redirect()->route('index');
            }else{
                // dd(345);
                return back()->withErrors('密码错误');
            }
        }else{
            return back()->withErrors('密码或账号错误');
        }
        // dd ("123");
    }

    public function loginout(){
        session()->flush();
        return redirect()->route('create');
    }
}
