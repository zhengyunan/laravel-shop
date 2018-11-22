<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $fillable = ['brand_name', 'describe','attribution','logo'];//开启白名单字段
}
