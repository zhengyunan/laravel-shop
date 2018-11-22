<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Article;
use App\Models\Admin\Articat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ArticleController extends Controller
{
    public function create(){
       $article = DB::table('article')
       ->join('articat','article.cat_id','=','articat.id')
       ->select('article.*','articat.cat_name')
       ->get();
       return view("Admin.article.article_list",[
           'article'=>$article
       ]);
    }

    public function add(){
        $articat = Articat::get();
        return view("Admin.article.article_add",[
            'articat'=>$articat
        ]);
    }

    public function doadd(Request $req){
        $article = new article;
         
         $data = $req->all();
         $article->fill($data);
         $article->user_id = session('id');
         $article->save();
         return redirect()->route('article_list');
        // dd("123");
    }

    public function edit(){
        $id = $_GET['id'];
        $article = Article::find($id);
        // dd($article);
        $cat_id = $article->cat_id;
        // dd($cat_id);
        $articat = Articat::get();
        // DD($articat);
        return view("Admin.article.article_edit",[
            'article'=>$article,
            'articat'=>$articat,
        ]);
    }

    public function update(Request $req){
        $id = $_GET['id'];
       $article = Article::find($id);
       $data = $req->all();
       $article->fill($data);
       $article->save();
       return redirect()->route('article_list');
    //    dd($data);
    }

    public function delete(){
        $id = $_GET['id'];
        $article = Article::destroy($id);  
        return redirect()->route('article_list');
    }
}
