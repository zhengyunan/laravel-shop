<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin\Rulecat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RulecatController extends Controller
{
    public function create(){
        //    $member = new Member;
           $rulecat= Rulecat::get();
       
            return view("Admin.rulecat.rulecat_list",[
                'rulecat'=>$rulecat
            ]);
        }
    public function doadd(Request $req){
        $rulecat = new Rulecat;
         $data = $req->all();
         $rulecat->fill($data);
         $rulecat->save();
         return redirect()->route('rulecat_list');
        // dd("123");
    }    
    public function edit(){
        $id = $_GET['id'];
        $rulecat = Rulecat::find($id);
        // DD($rulecat);
        return view("Admin.rulecat.rulecat_edit",[
            'rulecat'=>$rulecat,
        ]);
    }

    public function update(Request $req){
        $id = $_GET['id'];
        $rulecat = Rulecat::find($id);
        $data = $req->all();
        $rulecat->fill($data);
        $rulecat->save();
        return redirect()->route('rulecat_list');
     //    dd($data);
     }

    public function delete(){
        $id = $_GET['id'];
        $rulecat = Rulecat::destroy($id);  
        return redirect()->route('rulecat_list');
    }
}
