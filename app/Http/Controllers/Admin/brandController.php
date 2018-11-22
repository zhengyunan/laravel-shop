<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class brandController extends Controller
{
    // 显示页面
    public function create(){
        // echo "qwe";
        $brand = Brand::paginate(2);  
        // dd($brand);
       return view("Admin.Brand.brand_list",[
           'brand'=>$brand
       ]);
    }

    // 显示添加页面 
    public function add(){
        // echo "qwe";
       return view("Admin.Brand.brand_add");
    }

    public function doadd(Request $req){
          if($req->has('logo')&&$req->logo->isValid()){
              $date = date("Y-m-d");
              $logo_url = $req->logo->store('brand/'.$date);
            //   dd($logo_url);
          }
          $brand = new Brand;
          $data = $req->all();
          $brand->fill($data);
          
          $brand->logo = "/uploads/".$logo_url;
        //   dd($brand);
          $brand->save();
          return redirect()->route('brand_list');
    }

    public function edit(){
        $id = $_GET['id'];
        $brand = Brand::find($id);
       
        return view("Admin.Brand.brand_edit",[
            'brand'=>$brand,
        ]);
    }
    
    public function update(Request $req){
        $id = $_GET['id'];
        $brand = Brand::find($id);
        // dd($brand->logo);
        if($req->has('logo')&&$req->logo->isValid()){
           
            @unlink(base_path("public".$brand->logo));
            $date = date("Y-m-d");
            $logo_url = $req->logo->store('brand/'.$date);
        }
        // dd($logo_url); 
        $brand->fill($req->all());
        $brand->logo = "/uploads/".$logo_url;
        $brand->save();
        return redirect()->route('brand_list');
      
        
    }
    public function delete(){
        $id = $_GET['id'];
        $brand_all = Brand::find($id);
        // dd($brand_all->logo);
        @unlink(base_path("public".$brand_all->logo));
        $brand = Brand::destroy($id); 
        return redirect()->route('brand_list');
    }
       

}
