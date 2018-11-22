<?php

namespace App\Http\Controllers\Before;
use Flc\Dysms\Client;
// use Illuminate\Http\users;
use App\Models\Before\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Models\Admin\Register;  
Use Illuminate\Support\Facades\Cache;
Use Hash;
use Illuminate\Http\Request;
Use Flc\Dysms\Request\SendSms;


class RegisterController extends Controller
{   
    public function sendmobilecode(Request $req){
        // dd($req->mobile);
        //生成六位随机数
        $code = rand(10000,99999);
        //缓存时候的名字
        $name = 'code-'.$req->tel;
        //把随机数缓存起来(1分钟)
        // dd($name);
        Cache::put($name,$code,100);
        

        dd(Cache::get($name));
        //发送短信
        $config = [
               'accessKeyId'    => 'LTAI1qhYncr59ZgZ',
               'accessKeySecret' => 'yZzj6pDvnmii1IhpfFLSlpznmJur3v',
                ];
   
           $client  = new Client($config);
           $sendSms = new SendSms;
           $sendSms->setPhoneNumbers('17805202089');
           $sendSms->setSignName('郑宇楠');
           $sendSms->setTemplateCode('SMS_135475085');
           $sendSms->setTemplateParam(['code' => $code]);
   
           // 发送
           $client->execute($sendSms);
         
      
   
     }

    public function create(){
       
        return view('Before.register.register');
    }
    
    public function doregister(Request $req){
        // Cache::put('aa',123,100);

        // dd(Cache::get('aa'));

        //取出缓存中的名字
        // dd("123");
        $name = 'code-'.$req->tel;
        // dd($name);
        // dd($name);
        //再根据名字取出验证码
        $code = Cache::get($name);
        // dd($code);
        if(!$code || $code!=$req->mobile_code){
          return back()->withErrors(['mobile_code'=>'验证码错误']);
        }  
        if($req->password==$req->repassword){
          
        
           $password = Hash::make($req->password);
           $user = new Users;
           $user->tel = $req->tel;
           $user->password = $password;
           $user->username = $req->username;
        //    if($req->has('head_img')&&$req->head_img->isValid()){
        //      $date= date('Y-m-d');
        //      $head_img=$req->head_img->store('head_img/'.$date);
        //      $user->head_img = $head_img; 
        //    }
           $user->save();
           return redirect()->route('user_login');
        }else{
            return back()->withErrors(['password'=>'两次密码不一致']);
        }
   
     }

}
