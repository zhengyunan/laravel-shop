<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Rulecat extends Model
{
    protected $fillable = ['cat_name',];
    protected $table = 'rulecat';
}
