<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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
        $input = Input::except('_token');
        //获取上传的文件信息
        $file = Input::file('thumbnail');
        //检测上传文件是否有效
        if ($file->isValid())
        {
            //上传的文件需要为gif、jpg并且大小要小于100KB
            if ($file->getMimeType() == 'image/gif'
                || $file->getMimeType() == 'image/jpeg'
                || $file->getMimeType() == 'image/pjpeg'
                && $file->getSize < 100000)
            {
                //移动文件到public/img目录下
                $file->move('img/',$file->getClientOriginalName());
                //修改入库的文件名
                $input['thumbnail'] = $file->getClientOriginalName();
                //文章内容为空，向数据库插入数据会报错
                if (isset($input['content']))
                {
                    if (Article::create($input))
                        return redirect('admin/article');
                    return back()->with('error','添加文章失败！');
                }
                else
                    return back()->with('error','文章内容不能为空！');
            }
            else
                return back()->with('error','只能上传图片并且要求小于100KB');
        }
        else
            return back()->with('error','上传的文件无效！');
    }
    //GET|HEAD | admin/article | article.index | App\Http\Controllers\ArticleController@index
    public function index()
    {
        return view('article/index')->with('data',Article::where('cate_name','=','Default')->get())->with('cate',Category::all());
    }
}
