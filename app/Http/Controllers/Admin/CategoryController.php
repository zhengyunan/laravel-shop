<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function create(){
        // $category=Category::get();
        
        $data = new Category;
        $categories = $data->getCategoryInfoTest();
      
        foreach ($categories as $key => $item) {
        //   $category->category_name = $categories;
        }
    //    dd($categories);
        return view("Admin.Category.category_list",[
            // 'category'=>$category,
            'categories'=>$categories,
        ]);
    }
 
    public function delete(){
        $id = $_GET['id'];
        $category = Category::destroy($id);
        $son_category = Category::where('parent_id',$id)->delete();
        return redirect()->route('category_list');
    }

    public function add(Request $req){
        // $array = [];
        $cat_name = $req->cat_name;
        $pid = $_POST['fid'];
        // dd($pid);
        $category = new category;
        if($pid==0){
            $category->cat_name=$cat_name;
            $category->parent_id = $pid;
            $category->level = 0;
        }else{
            $data = $category::find($pid);
            $newlevel = (($data->level)+1);
            $category->parent_id = $pid;
            $category->cat_name=$cat_name;
            $category->level = $newlevel;
            // dd($category);
        }
        $category->save();
        return redirect()->route('category_list');
    }

    public function edit(){ 
        $id = $_GET['id'];
        $data = new Category;
        $category = Category::find($id);
        $pid = $category->parent_id;
        $pidcate = Category::find($pid);
        $categories = $data->getCategoryInfoTest();
      
        foreach ($categories as $key => $item) {
        //   $category->category_name = $categories;
        }
        // dd($category);
        return view("Admin.Category.category_edit",[
             'category'=>$category,
             'categories'=>$categories,
         ]);
    }

    public function update(Request $req){
        $id = $_GET['id'];
        $category = new Category;
        $cat_name = $req->cat_name;
        $pid= $_POST['parent_id'];  
        // dd($pid);
        $data = $category::find($pid);
        // dd($data);
        $cat_up = $category::find($id);
        $newlevel = (($data->level)+1);
        $cat_up->parent_id = $pid;
        $cat_up->cat_name=$cat_name;
        $cat_up->level = $newlevel;
        // $cat_up->fill($req->all());
        // dd($cat_up);
        $cat_up->save();
        return redirect()->route('category_list');
       
    }
}
