<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['rule_name','url_path','parent_id','cat_id'];
    protected $table = 'rule';
}
