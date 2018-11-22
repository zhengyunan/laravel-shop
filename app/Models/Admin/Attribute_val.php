<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Attribute_val extends Model
{
    protected $fillable = ['attr_val','attr_key_id'];
    // public $timestamps = false;
    protected $table = 'attribute_val';
}
