<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
class Attribute_key extends Model
{
    protected $fillable = ['attr_name','goods_id'];
    // public $timestamps = false;
    protected $table = 'attribute_key';

    function vals(){
        return $this->hasMany(Attribute_val::class,'attr_key_id');
    }

}
