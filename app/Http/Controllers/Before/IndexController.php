<?php

namespace App\Http\Controllers\Before;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
       public function index(){
        $category = Category::get()->toArray();
        // 递归排序
        $sort = $this->sortTree($category);  
        $arr = [];   
        $count = 0;
        foreach($sort as $key=>$v){
    
            if($v['level'] == 1){
                $arr[] = $v;
                $count++;
            }
            if($v['level'] == 2){
                $arr[$count-1]['two'][] = $v;
               }
            
        }  
        // dd($arr);
        foreach($arr as $ky=>&$v){
        //  dd($arr);
         if(isset($v['two'])){
            foreach($v['two'] as $k=>&$a){  
                //  dd($v['two']);
               
                    // dd('123');
                    foreach($sort as $kk=>$key){
            
                        if($a['id'] == $key['parent_id']){
                            $a['three'][] = $key; 
                        
                        }
                    
                    }
                
               }   
            }
       
    }

    // dd($arr);
           return view('Before.index.index',[
            'arr'=>$arr,
           ]);
       
    }
       public function sortTree($data,$parent_id=0,$level=1){
            // 保存数据
            static $ret =[];
            // 循环
            foreach($data as $v){
                // 判断是否是顶级分类
                if($v['parent_id']==$parent_id){
                    // 如果是顶级分类，就标记它的层级
                    $v['level'] = $level;
                    // 挪到排序之后的数组中
                    $ret[] = $v;
                    // 递归查询（子级分类）
                    $this->sortTree($data,$v['id'],$level+1);

                }
            }
            return $ret;
       }
    }