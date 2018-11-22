<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function level_create(){
        $level = new Level;
        $level = Level::get();
        return view("Admin.Level.level_list",[
            'level'=>$level
        ]);
    }
}
