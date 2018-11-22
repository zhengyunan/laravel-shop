<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['level','kiss'];
    // public $timestamps = false;
    protected $table = 'level';
}