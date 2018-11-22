<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Role;
use App\Models\Admin\Rule;
use App\Models\Admin\Rulecat;
use App\Models\Admin\Role_rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    public function create(){
      $data =DB::table('role')
            ->join('role_rule', 'role.id', '=', 'role_rule.role_id')
            ->join('rule', 'role_rule.rule_id', '=', 'rule.id')
            ->select('role.id', 'role.role_name', 'rule.rule_name')
            ->groupby('role.id')
            ->select('role.id','role.role_name','role.content',DB::raw('group_concat(shop_rule.rule_name) as rule_list'))
            ->get();
        // dd($data);
        return view("Admin.role.role_list",[
            'data'=>$data
        ]);
       
    }

    public function add(){
       $rule = Rule::get();
       $rulecat = Rulecat::get();
       return view("Admin.role.role_add",[
           'rulecat'=>$rulecat,
           'rule'=>$rule
       ]);
    }

    public function doadd(Request $req){
        $data=$req->all();
        $role = new Role;
        $role->fill($data);
        $role->save();
        $role_lastAll = DB::table('role')->orderBy('id','desc')->first();
        $role_id = $role_lastAll->id;
        // dd($data);
        foreach($data['rule_id'] as $v){
            DB::INSERT("insert into shop_role_rule (role_id,rule_id) values(?,?)",[$role_id,$v]);
        }
      
        return redirect()->route('role_list');
    }


    public function edit(){
        $id = $_GET['id'];
        $rule = Rule::get();
        // dd($id)
        $rulecat = Rulecat::get();
        // dd($rule);
        $role_only = Role::find($id);
        // dd($role_only->id);
        $role_rule = DB::table('role_rule')->where('role_id','=',$id)->select('rule_id')->get()->toArray();
        $data = json_decode(json_encode($role_rule), true);
        // dd($data);
        $r = [];
            foreach($data as $k=>$v){
                $r[] = $v['rule_id'];
        }
    //    dd($r);
        return view("Admin.role.role_edit",[
            'rule'=>$rule,
            'rulecat'=>$rulecat,
            'r'=>$r,
            'role_only'=>$role_only
        ]);
    }

    public function update(Request $req){
        
        $id = $_GET['id'];
        // dd($id);
        $data = $req->all();
        $role = Role::find($id);
        $role->fill($data);
        $role->save();
        DB::delete("delete from shop_role_rule where role_id=?",[$id]);
        
        // dd($data['rule_id']);
        foreach($data['rule_id'] as $v){
            DB::INSERT("insert into shop_role_rule (role_id,rule_id) values(?,?)",[$id,$v]);
        }
        return redirect()->route('role_list');
    }

    public function delete(){
        $id = $_GET['id'];
        $role = Role::destroy($id);
        $role_rule =Role_rule::where('role_id',$id)->delete();
        return redirect()->route('role_list');

    }
}
