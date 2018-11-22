<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['title','content','is_show','cat_id'];
}
