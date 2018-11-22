<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    protected $fillable = ['admin_id','role_id'];
    protected $table = 'admin_role';
}
