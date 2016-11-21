<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //GET|HEAD  | admin/article/create | article.create | App\Http\Controllers\ArticleController@create
    public function create()
    {
        $cate = Category::all();
        if (count($cate)>0)
            return view('article/create')->with('cate',$cate);
        return redirect('admin/category/create')->with('errors','添加文章需要选择分类，您尚无分类，请先添加分类！');
    }
    //POST      | admin/article | article.store    | App\Http\Controllers\ArticleController@store
    public function store()
    {
        $input = Input::except('_token');
        //获取上传的文件信息
        $file = Input::file('thumbnail');
        //检测上传文件是否有效
        if ($file->isValid())
        {
            //上传的文件需要为gif、jpg并且大小要小于50KB
            if ($file->getMimeType() == 'image/gif'
                || $file->getMimeType() == 'image/jpeg'
                || $file->getMimeType() == 'image/pjpeg'
                && $file->getSize < 50000)
            {
                //移动文件到public/img目录下
                $file->move('img/',$file->getClientOriginalName());
                //修改入库的文件名
                $input['thumbnail'] = $file->getClientOriginalName();
                //文章内容为空，向数据库插入数据会报错
                if (isset($input['content']))
                {
                    if (Article::create($input))
                        return view('article/index')->with('data',Article::where('cate_name','=',$input['cate_name'])->get())->with('cate',Category::all());
                    return back()->with('error','添加文章失败！')->with('data',$input);
                }
                else
                    return back()->with('error','文章内容不能为空！');
            }
            else
                return back()->with('error','只能上传图片并且要求小于50KB');
        }
        else
            return back()->with('error','上传的文件无效！');
    }
    //GET|HEAD | admin/article | article.index | App\Http\Controllers\ArticleController@index
    public function index()
    {
        $cate = Category::first();
        if (is_null($cate))
            return redirect('admin/category/create')->with('errors','您尚无分类与文章，添加文章之前需要先添加分类，请先添加分类！');
        else
            if (is_null(Article::first()))
                return redirect('admin/article/create')->with('error','您尚无文章，请添加！');
            else
                return view('article/index')->with('data',Article::where('cate_name','=',$cate->name)->get())->with('cate',Category::all());
    }
    //POST|HEAD | admin/article/{cate_name?},自定义的方法，用于显示不同的分类
    public function ChangeCate($cate_name = 'Default')
    {
        $data = Article::where('cate_name','=',$cate_name)->get();
        return $data;
    }
    //GET|HEAD | admin/article/{article} | article.show | App\Http\Controllers\ArticleController@show
    public function show($art_id)
    {
        return view('article/show')->with('data',Article::find($art_id));
    }
    //GET|HEAD | admin/article/{article}/edit  article.edit | App\Http\Controllers\ArticleController@edit
    public function edit($art_id)
    {
        return view('article/edit')->with('data',Article::find($art_id))->with('cate',Category::all());
    }
}
