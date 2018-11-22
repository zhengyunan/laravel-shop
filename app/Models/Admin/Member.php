<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['username','password','signature','tel','email','attribution'];
    // public $timestamps = false;
    protected $table = 'users';
}
