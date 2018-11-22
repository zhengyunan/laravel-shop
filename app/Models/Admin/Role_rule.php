<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role_rule extends Model
{
    protected $fillable = ['role_id','rule_id'];
    protected $table = 'role_rule';
    public $timestamps = false;
}
