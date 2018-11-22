<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Member;
use App\Models\Admin\User;
use App\Models\Admin\User_level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class MemberController extends Controller
{
    public function create(){
    //    $member = new Member;
       $users=User::get();
       
        return view("Admin.Member.member_list",[
            'users'=>$users
        ]);
    }
    public function xiangxi(){
           //$member = new Member;
           $id = $_GET['id'];
           $xiangxi=User::find($id);
       
            return view("Admin.Member.member_xiangxi",[
                'xiangxi'=>$xiangxi
            ]);
        }
    public function add(){
        return view("Admin.Member.member_add");
    }
 
    public function doadd(Request $req){
        $member = new Member;
        $member->fill($req->all());
        $member->password = md5($req->password);
        $member->save();
        $users = DB::table('users')->orderBy('id', 'desc')->first();
        $user_id = $users->id;
        $level_id = 1;      
        $user_level=DB::insert("insert into shop_user_level(user_id,level_id) 
        values(?,?)",[$user_id,$level_id]);
        return redirect()->route('member_list');
    }
    
    public function edit(){
        $id = $_GET['id'];
        $user = User::find($id);
        return view("Admin.Member.member_edit",[
            'user'=>$user
        ]);
    }
    

    public function update(Request $req){
        $id = $_GET['id'];
      $user = User::find($id);
      $user->fill($req->all());
      $user->save();
      return redirect()->route('member_list');
    }
    
    public function pass_edit(){
        $id = $_GET['id'];
        $user = User::find($id);
        return view("Admin.Member.member_edit-pass",[
            'user'=>$user
        ]);
    }

    public function pass_update(Request $req){
        $id = $_GET['id'];
        $user = User::find($id);
        // dd($user);
        if(md5($req->oldpass)==($user->password)){
            
            if($req->newpass==$req->repass){
                // dd('123');
                $user->password = md5($req->newpass);
                $user->save();
                return redirect()->route('member_list');
                
            }
        }
    }

    public function delete(){
        $id = $_GET['id'];
        
        $user = User::destroy($id);
        $user = User_level::where('user_id', $id)->delete();
        return redirect()->route('member_list');
    }
}
