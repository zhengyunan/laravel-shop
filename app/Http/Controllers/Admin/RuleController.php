<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Rule;
use App\Models\Admin\Role;
use App\Models\Admin\Rulecat;
use App\Models\Admin\Role_rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RuleController extends Controller
{
    public function create(){
        $data =DB::table('rule')
              ->join('rulecat','rule.cat_id','=','rulecat.id')
              ->select('rule.*','rulecat.cat_name')
              ->get();
           
        $rulecat = Rulecat::get();
        // dd($rule);
        return view("Admin.rule.rule_list",[
            'data'=>$data,
            // 'role'=>$role,
            'rulecat'=>$rulecat
        ]);
    }

    public function doadd(Request $req){
        $rule= new Rule;
        $data = $req->all();
        $rule->fill($data);
        $rule->save();
        
        return redirect()->route('rule_list');
    }
    

    public function edit(){
        $id = $_GET['id'];
        $data = DB::table('rule')
              ->join('rulecat','rule.cat_id','=','rulecat.id')
             
              ->select(          
                  'rule.rule_name',
                  'rule.id',
                  'rule.url_path',
                  'rule.cat_id',
                  'rulecat.cat_name'
              )
              ->where('rule.id','=',$id)
              ->first();  
            //  dd($data);
        $role= Role::get(); 
        $rulecat = Rulecat::get();
        return view("Admin.rule.rule_edit",[
            'data'=>$data,
            'role'=>$role,
            'rulecat'=>$rulecat
        ]);
    }

    public function update(Request $req){
        $id = $_GET['id'];
        $rule = Rule::find($id);
        $data = $req->all();
        $rule->fill($data);
        $rule->save();
        
        return redirect()->route('rule_list');

    }
    public function delete(){
        $id = $_GET['id'];
        $rule = Rule::destroy($id);
        return redirect()->route('rule_list');
    }
}
