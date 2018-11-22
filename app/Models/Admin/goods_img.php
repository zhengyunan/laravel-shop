<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class goods_img extends Model
{
    protected $fillable = ['bigimg_path','smallimg_path','sku_id'];
    // public $timestamps = false;
    protected $table = 'goods_imgs';
}
