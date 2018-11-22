<?php

namespace App\Models\Before;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['username','password','signature','tel','email','attribution'];
    // public $timestamps = false;
    protected $table = 'users';
}
