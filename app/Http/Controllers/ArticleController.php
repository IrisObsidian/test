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
        //提交的信息中，thumbnail保存的临时文件名。先将数据保存下来，在入库之前做修改。
        $input = Input::except('_token');
        //限制上传的文件只能为.gif或.jpeg,文件大小必须小于100KB
        if (($_FILES['thumbnail']['type'] == 'image/gif'
            || $_FILES['thumbnail']['type'] == 'image/jpeg'
            || $_FILES['thumbnail']['type'] == 'image/pjpeg')
            && $_FILES['thumbnail']['size'] < 100000)
        {
            //上传文件是否出错
            if ($_FILES['thumbnail']['error'] > 0)
            {
                //返回错误信息
                return back()->with('error','上传文件失败，错误代码：'.$_FILES['thumbnail']['error'].'!');
            }
            else
            {
                if (Storage::disk('public')->exists($_FILES['thumbnail']['name']))
                    return back()->with('error','该文件已存在！');
                else
                {
                    //保存文件
                    Storage::disk('public')->put($_FILES['thumbnail']['name'],$_FILES['thumbnail']['tmp_name']);
                    //修改入库信息
                    $input['thumbnail'] = $_FILES['thumbnail']['name'];
                    //存入数据库
                    if (Article::create($input))
                        return redirect('admin/article');
                    return back()->with('error','添加文章失败！');
                }
            }
        }
        else
            return back()->with('error','无效的文件类型！');
    }
    //GET|HEAD | admin/article | article.index | App\Http\Controllers\ArticleController@index
    public function index()
    {
        return view('article/index')->with('data',Article::all());
    }
}
