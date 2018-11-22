<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use DB;
class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable = ['cat_name','parent_id','level'];
    //使用递归获取分类 （正式函数）
    public function getCategory($sourceItems, $targetItems, $parent_id=0){
        foreach ($sourceItems as $k => $v) {
            if($v->parent_id == $parent_id){
                $v->cat_name =$v->cat_name;
                $targetItems[] = $v;
                $this->getCategory($sourceItems, $targetItems, $v->id);
                // dd($v);
            }
        }
    }

    //使用递归获取分类信息 （正式函数）
    public function getCategoryInfo(){
        $sourceItems = $this->get();
        $targetItems = new Collection;
        $this->getCategory($sourceItems, $targetItems, 0);
        return $targetItems;
    }

    // 前台分类显示

    //测试函数 （测试正式函数）
    public function getCategoryInfoTest(){
        $sourceItems = $this->get();
        $targetItems = new Collection;
        $this->getCategoryTest($sourceItems, $targetItems);
        return $targetItems;
    }



     //使用递归获取分类信息测试函数 （测试正式函数）
     public function getCategoryTest($sourceItems, $targetItems, $parent_id=0, $str='ㅣ'){
        $str .= 'ㅡ';
        foreach ($sourceItems as $k => $v) {
            if($v->parent_id == $parent_id){
                $v->cat_name = $str.$v->cat_name;
                
                $targetItems[] = $v;
                $this->getCategoryTest($sourceItems, $targetItems, $v->id, $str);
            }
        }
    }


}