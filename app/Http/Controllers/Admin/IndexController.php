<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 

class IndexController extends Controller
{

    public function index(){
        return view("Admin.index.index");
    }
    public function home(){
        return view("Admin.index.welcome");
    }
}
