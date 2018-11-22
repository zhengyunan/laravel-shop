<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Goods;
use App\Models\Admin\brand;
use App\Models\Admin\Category;
use App\Models\Admin\Attribute_key;
use App\Models\Admin\Attribute_val;
use App\Models\Admin\goods_sku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsRequest;
use DB;
use Image;
class GoodsController extends Controller
{
    // 显示页面
    public function create(){
        
     $goods = Goods::orderBy('id', 'desc')->paginate(2);  
      return view("Admin.Goods.goods_list",[
          'goods'=>$goods,

      ]);
     }
     public function ajax_get_cat(){
        $id = (int)$_GET['id'];
        $category = new category; 
        $data =$category->where('parent_id', $id)->get();
        // dd($data);
        echo json_encode($data);
     }
     public function add(){
        $brand = new Brand; 
        $brand = Brand::get();
        $category = new category; 
        $category =$category->where('parent_id', 0)->get();
        // dd($category);
        return view("Admin.Goods.goods_add",[
            'brand'=>$brand,
            'category'=>$category,
        ]);
      }

    
     public function doadd(Request $req){
        if($req->has('logo')&&$req->logo->isValid()){
            $date = date("Y-m-d");
            $logo_url = $req->logo->store('goods/'.$date);

            $path = $req->logo->path();
                        Image::configure(array('driver'=>'gd'));
                        $img = Image::make($path);
                        // dd($img);
                        // 上传大图，等比例
                        $img->resize(215,255);
                        // dd(public_path('/uploads/goods/bigImg/'.$date));
                        @mkdir(public_path('uploads/goods/'.$date),0777,true);
                        
                        $img->save(public_path('/uploads/'.$logo_url));
        }
        $goods = new Goods; 
        $data = $req->all();
        $goods->fill($data);
        $goods->logo = "/uploads/".$logo_url;
        $goods->admin_id = session('id'); 
        $goods->save();
        return redirect()->route('goods_list');
     }
     

     public function edit(){
         $id = $_GET['id'];
        $goods = Goods::find($id);
        // dd($goods->brand_id);
        $category = new category; 
        $category =$category->where('parent_id', 0)->get();
        $brand = Brand::get();
        //  dd($brand);
        return view("Admin.Goods.goods_edit",[
            'goods'=>$goods,
            'brand'=>$brand,
            'category'=>$category
        ]);
    }
    public function update(Request $req){
        $id = $_GET['id'];
        $goods = Goods::find($id);
        // dd(session('id'));
        
        if($goods->admin_id!=session('id')){   
            return back()->withErrors('无权修改');
        }
        if($req->has('logo')&&$req->logo->isValid()){
           
            @unlink(base_path("public".$goods->logo));
            $date = date("Y-m-d");
            $logo_url = $req->logo->store('goods/'.$date);
            $path = $req->logo->path();
            Image::configure(array('driver'=>'gd'));
            $img = Image::make($path);
            // dd($img);
            // 上传大图，等比例
            $img->resize(215,255);
            // dd(public_path('/uploads/goods/bigImg/'.$date));
            @mkdir(public_path('uploads/goods/'.$date),0777,true);
            
            $img->save(public_path('/uploads/'.$logo_url));
        }
        $goods->fill($req->all());
        $goods->admin_id=session('id');
        // dd($goods);
        $goods->logo = "/uploads/".$logo_url;
        $goods->save();
        return redirect()->route('goods_list');
        // dd("123");
    }


    // 删除
    public function delete(){
        $id = $_GET['id'];
        $goods = Goods::find($id);
        @unlink(base_path("public".$goods->logo));
        $goods = Goods::destroy($id);  
        return redirect()->route('goods_list');
    }









    // sku

        public function open_sku(){
            $id = $_GET['id'];
            // dd($goods_id);
            // 这个商品id的所有规格
            $Attribute_key = Attribute_key::where('goods_id',$id)->get();
            return view("Admin.Goods.goods_addsku",[
                'Attribute_key'=>$Attribute_key,
                'id'=>$id
            ]);
        }


        public function doattrkey(Request $request){
            $Attribute_key = new Attribute_key;
            $Attribute_key->goods_id = $request->id;
            // dd($request->id);
            $Attribute_key->attr_name = $request->name;
            $Attribute_key->save();
    
        }
        public function doattrval(Request $request){
            
            $Attribute_val = new Attribute_val;
            
            $Attribute_val->attr_key_id = $request->id;
            
            // dd($request->id);
            $Attribute_val->attr_val =  $request->sepcval;
            $Attribute_val->save();
    
        }
       
        public function dosku(Request $req){
            $id = $_GET['id'];
            // 1.根据商品id取出规格id
            $ids = [];
            $Attribute_key = Attribute_key::where('goods_id',$id)->get()->toArray();
           
            foreach($Attribute_key as $v){
                $ids[] = $v['id'];
            }
            
            // 2.拼接select框名
            foreach($ids as $k){
                $str = 'sku_all'.$k;
                $arr['sku_all'][] = $req->$str;
            }
            // dd($arr);
             // 3.拼接规格id
             foreach($arr['sku_all'] as $k => $v)
             {   
                 foreach($v as $k1 => $v1)
                 {
                     $data[$k1][] = $v1;  
                 } 
             }
             foreach($data as $v){
                $sku_all[] = implode("-",$v);
            } 
            //  dd($req->stock);
             //4.保持到数据库
             
             $arr['sku_all'] = $sku_all;
             $arr['stock'] = $req->stock;
             $arr['price'] = $req->price;
             $arr['old_price'] = $req->old_price;
             $arr['sku_name'] = $req->sku_name;
             for($i=0; $i<count($arr['sku_all']); $i++){
                $sku = new goods_sku;
                $sku->goods_id = $id;
                $sku->sku_all = $arr['sku_all'][$i];
                $sku->stock = $arr['stock'][$i];
                $sku->price = $arr['price'][$i];
                $sku->old_price = $arr['old_price'][$i];
                $sku->sku_name = $arr['sku_name'][$i];
                $a = $sku->save();
                $sku_lastAll = DB::table('goods_sku')->orderBy('id','desc')->first();
                $sku_id = $sku_lastAll->id;
                // dd($sku_id);
                foreach($req->image as $k=>$v) {

                    if($req->has('image')&&$req->image[$k]->isValid()) {
        
                        // $Image = new Image;
                        $date = date('Y-m-d');
                        $big_url = $req->file('image')[$k]->store('/sku/bigImg/'.$date);
                        // dd($big_url);
                        $path = $req->image[$k]->path();
                        Image::configure(array('driver'=>'gd'));
                        $img = Image::make($path);
                        // dd($img);
                        // 上传大图，等比例
                        $img->resize(410,null,function($c){
                            $c->aspectRatio();
                        });
                        // dd(public_path('/uploads/goods/bigImg/'.$date));
                        @mkdir(public_path('uploads/sku/bigImg/'.$date),0777,true);
                        
                        $img->save(public_path('/uploads/'.$big_url));
        
                        // 上传小图 等比例
                        $img->resize(400,null,function($c){
                            $c->aspectRatio();
                        });
                        $sm_url = $req->file('image')[$k]->store('/sku/smImg/'.$date);
                        // dd($sm_url);
                        @mkdir(public_path('uploads/sku/smImg/'.$date),0777,true);
        
                        $img->save(public_path('uploads/'.$sm_url));
        
                        DB::table('goods_imgs')
                            ->insert(['sku_id'=>$sku_id,'smallimg_path'=>'/uploads/'.$sm_url,'bigimg_path'=>'/uploads/'.$big_url]);
                    }
                }
                return back();
            
        
            }

        }
    }


