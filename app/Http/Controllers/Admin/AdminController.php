<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use App\Models\Admin\Admin_role;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function create(){
        $data = DB::table('admins')         //将两张表拼接起来
        ->join('admin_role', function($join)
        {
            $join->on('admins.id', '=', 'admin_role.admin_id');
        })
        ->join('role',function($join){
            $join->on('admin_role.role_id', '=', 'role.id');
        })
        ->get();
        // dd($data);
        return view("Admin.Admin.admin_list",[
            'data'=>$data
        ]);
    }
    public function add(){
        $role = Role::get();
        return view("Admin.admin.admin_add",[
            'role'=>$role
        ]);
    }
    public function doadd(Request $req){
        
         
        // dd($data);
        $role_id = $req->role_id;
        // dd($req->all());
        if($req->admin_password==$req->repass){
            $admin = new Admin; 
            
           
            $data = $req->all(); 
           
           
            //  dd($data);
            $admin->fill($data); 
            $admin->admin_password = Hash::make($req->admin_password);
            // dd($admin);
            $admin->save();
            $last_all = DB::table('admins')->orderBy('id', 'desc')->first();
            // dd($last_all)
            $admin_id = $last_all->id;
            $admin_role=DB::insert("insert into shop_admin_role(admin_id,role_id) values(?,?)",[$admin_id,$role_id]);
            return redirect()->route('Admin_list');
        }
    
    }
    public function edit(){
        $id = $_GET['id'];
        $data = DB::table('admins')         //将两张表拼接起来
        ->join('admin_role', function($join)
        {
            $join->on('admins.id', '=', 'admin_role.admin_id');
        })
        ->join('role',function($join){
            $join->on('admin_role.role_id', '=', 'role.id');
        })
        ->where('admins.id',$id)
        ->first();
        
        $role = Role::get();
        return view("Admin.admin.admin_edit",[
            'data'=>$data,
            'role'=>$role
        ]);
    }

    public function update(Request $req){
        $admin_id = $_GET['id'];
        $admin = admin::find($admin_id);
        $admin->fill($req->all());
        $admin->save();

        $role = Admin_role::where('admin_id','=',$admin_id)->first();
        $role_id = $req->role_id;
        $admin_role=DB::update("update  shop_admin_role set role_id=? where admin_id=?",[$role_id,$admin_id]);
        return redirect()->route('Admin_list');
    }

    public function delete(){
        $admin_id= $_GET['id'];
        $admin = Admin::find($admin_id);
        $admin::destroy($admin_id);
        // $role = Admin_role::where('admin_id','=',$admin_id)->first();
        $role = DB::delete('delete from shop_Admin_role where admin_id=?',[$admin_id]);
        return redirect()->route('Admin_list');

    }
}
