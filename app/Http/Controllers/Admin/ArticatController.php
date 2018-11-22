<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin\Articat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticatController extends Controller
{
    public function create(){
        $articat = Articat::get();
        return view("Admin.articat.articat_list",[
            'articat'=>$articat
        ]);
     }
     public function add(){
        return view("Admin.articat.articat_add",[
        ]);
    }

    public function doadd(Request $req){
        $articat = new articat;
         $data = $req->all();
         $articat->fill($data);
         $articat->save();
         return redirect()->route('articat_list');
        // dd("123");
    }
    
    public function edit(){
        $id = $_GET['id'];
        $articat = Articat::find($id);
        // DD($articat);
        return view("Admin.articat.articat_edit",[
            'articat'=>$articat,
        ]);
    }
    public function update(Request $req){
        $id = $_GET['id'];
        $articat = Articat::find($id);
        $data = $req->all();
        $articat->fill($data);
        $articat->save();
        return redirect()->route('articat_list');
     //    dd($data);
     }

     public function delete(){
        $id = $_GET['id'];
        $articat = Articat::destroy($id);  
        return redirect()->route('articat_list');
    }
}
