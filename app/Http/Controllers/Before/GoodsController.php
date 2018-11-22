<?php

namespace App\Http\Controllers\Before;
use App\Models\Admin\Goods;
use App\Models\Admin\goods_sku;
use App\Models\Admin\goods_img;
use App\Models\Admin\Attribute_key;
use App\Models\Admin\Attribute_val;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
class GoodsController extends Controller
{   
    // 显示商品列表
    public function create(){
        // $id = $_GET['cat1_id'];
        // dd($id);
        if(isset($_GET['cat_id'])){
            $cat3_id = $_GET['cat_id'];
            $goods = Goods::where('cat3_id',$cat3_id)->get()->toArray();
            $sku = goods_sku::get()->toArray();
            $img = goods_img::get()->toArray();
            // dd($goods);
            $goodsidall = [];
            foreach($goods as $key=>$v){
                $goodsidall[] = $v;
                if(isset($sku)){
                    foreach($sku as $h=>$c){
                       if($v['id']==$c['goods_id']){
                           $goodsidall[$key]['sku'][] = $c;
                           if(isset($img)){
                               foreach($img as $d=>$a){
                            $goodsidall[$key]['sku'][$d]['sku_img'][] = $a;
                           }
                           }
                           
                       }
                   }
                }
                   
            }
            // dd($goodsidall);
        }
        return view("Before.goods.goods_list",[
            'goodsidall'=>$goodsidall
        ]);
    }
    

    // 显示商品详情页
    public function xiangqing_create(){
        $goods_id = $_GET['id'];
        // $goods_id = $_GET['id'];
        $goods = Goods::where('id',$goods_id)->get()->toArray();
        $sku = goods_sku::where('goods_id',$goods_id)->get()->toArray();
        $attr_key = Attribute_key::where('goods_id',$goods_id)->get()->toArray();
        // $attr_val = Attribute_val::get()->toArray();
        $img = goods_img::get()->toArray();
        $goodsidall = [];
            foreach($goods as $v){
                $goodsidall = $v;
                if(isset($sku)){
                    foreach($sku as $h=>$c){
                       if($v['id']==$c['goods_id']){
                           $goodsidall['sku'][] = $c;
                           if(isset($img)){
                               foreach($img as $d=>$a){
                                   if($a['sku_id']==$c['id']){
                                       $goodsidall['sku'][$h]['img'][]= $a;
                                   }                           
                           }

                           }
                           
                           
                       }
                   }
                }
                if(isset($attr_key)){
                    foreach($attr_key as $o=>$n){
                     $goodsidall['key'][] = $n;
                     $attr_val = Attribute_val::where('attr_key_id',$n['id'])->get()->toArray();
                     $val = [];
                      foreach($attr_val as $x){
                        $val[]= $x; 
                          
                      }
                     $goodsidall['key'][$o]['val'] = $val;
                    }
                }
                   
            }
            // dd($goodsidall);
        return view('Before.goods.goods_xiangqing',[
           'goodsidall'=>$goodsidall
        ]);
    }
    public function goods_xiangqing(){
        $goods_id = $_GET['id'];
        $goods = Goods::where('id',$goods_id)->get()->toArray();
        $sku = goods_sku::where('goods_id',$goods_id)->get()->toArray();
        $attr_key = Attribute_key::where('goods_id',$goods_id)->get()->toArray();
        $attr_val = Attribute_val::get()->toArray();
        $img = goods_img::get()->toArray();
            // dd($goods);
            $goodsidall = [];
            foreach($goods as $key=>$v){
                $goodsidall[] = $v;
                if(isset($sku)){
                    foreach($sku as $h=>$c){
                       if($v['id']==$c['goods_id']){
                           $goodsidall[$key]['sku'][] = $c;
                           if(isset($img)){
                               foreach($img as $d=>$a){
                                   if($a['sku_id']==$c['id']){
                                       $goodsidall[$key]['sku'][$h]['img'][]= $a;
                                   }                           
                           }

                           }
                           if(isset($attr_key)){
                               foreach($attr_key as $o=>$n){
                                $goodsidall[$key]['sku'][$h]['key'][] = $n;
                                    foreach($attr_val as $q=>$t){
                                        if($n['id']== $t['attr_key_id']){
                                            $goodsidall[$key]['sku'][$h]['key'][$o]['val'][] = $t;
                                        }
                                    }
                               
                               }
                           }
                           
                       }
                   }
                }
                   
            }
          return $goodsidall ;
        
    }
    
}
