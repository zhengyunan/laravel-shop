<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username','password','signature','tel','email','attribution'];
    // public $timestamps = false;
    protected $table = 'users';
}
