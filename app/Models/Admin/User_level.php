<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User_level extends Model
{
    protected $fillable = ['user_id','level_id'];
    protected $table = 'user_level';
}
