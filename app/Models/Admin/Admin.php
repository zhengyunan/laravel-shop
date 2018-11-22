<?php

namespace App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use PDO;
use DB;
class Admin extends Model
{   
    protected $table = 'admins';
    protected $fillable = ['admin_name','admin_password','tel','email'];
    // public function getAdmin($req){
    //     return Admin::where('admin_name',$req->admin_name)->first();
    // }

    public function getUrl_path($admin_id){
        // DB::setFetchMode(PDO::FETCH_ASSOC);
        $data = DB::table('admin_role')         //将两张表拼接起来
        ->join('role_rule',function($join){
            $join->on('admin_role.role_id', '=', 'role_rule.role_id');
        })
        ->join('rule',function($join){
            $join->on('role_rule.rule_id', '=', 'rule.id');
        })
        ->select('rule.url_path')
        ->where('admin_role.admin_id',$admin_id)
        ->get();
        $data = json_decode(json_encode($data), true);
    //    dd($data);
        $_ret = [];
        foreach($data as $v){
            
            if(FALSE === strpos($v['url_path'],',')){
                 // 如果没有,，就直接拿过来
                 $_ret[] = $v['url_path'];
            }else{
                //  如果有就直接转为数组
                $_tt = explode(',',$v['url_path']);
                // 把转换完的数组合并到一维数组中
                $_ret = array_merge($_ret,$_tt);
            }
            
        }
      return $_ret ;
    }
}
