<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //首页
    public function index()
    {
        $FirstCate = Category::orderBy('updated_at','desc')->first();
        if (is_null($FirstCate))
            return view('welcome')->with('error','您尚无分类，请先登录添加！');
        if (is_null(Article::first()))
            return view('welcome')->with('error','您尚无文章，请先登录添加！');
        return view('welcome')->with('category',Category::orderBy('updated_at','desc')->get())->with('article',Article::where('cate_name',$FirstCate->name)->orderBy('updated_at','desc')->get());
    }

    public function chcate($cate_name)
    {
        return $data=Article::where('cate_name',$cate_name)->orderBy('updated_at','desc')->get();
    }

    public function showart($art_id)
    {
        return view('showart')->with('data',Article::where('id',$art_id)->first());
    }
}
