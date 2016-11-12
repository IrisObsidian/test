<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //GET|HEAD  | admin/article/create | article.create | App\Http\Controllers\ArticleController@create
    public function create()
    {
        return view('article/create')->with('cate',Category::all());
    }
    //POST      | admin/article | article.store    | App\Http\Controllers\ArticleController@store
    public function store()
    {
        dd(Input::all());
    }
    //GET|HEAD | admin/article | article.index | App\Http\Controllers\ArticleController@index
    public function index()
    {
        return "index";
    }
}
