<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = ['goods_name','title','content','goods_bianhao','attribution','logo','cat1_id','cat2_id','cat3_id','brand_id','admin_id'];
    // public $timestamps = false;
    protected $table = 'goods';
   
      
    
}
