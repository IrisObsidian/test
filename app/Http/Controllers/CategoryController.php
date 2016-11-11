<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //GET|HEAD | admin/category | category.index | App\Http\Controllers\CategoryController@index
    public function index()
    {
        return view('category/index')->with('data',Category::orderBy('updated_at','asc')->get());
    }
    //GET|HEAD | admin/category/create | category.create | App\Http\Controllers\CategoryController@create
    public function create()
    {
        return view('category/create');
    }
    //POST | admin/category | category.store  | App\Http\Controllers\CategoryController@store
    public function store()
    {
        if (Category::create(Input::except('_token')))
            return redirect('admin/category');
        return back()->with('errors','新增分类信息失败,请稍后重试！')->with('data',Input::except('_token','created_at','updated_at'));
    }
    //GET|HEAD | admin/category/{category}/edit | category.edit | App\Http\Controllers\CategoryController@edit
    public function edit($cate_id)
    {
        return view('category/edit')->with('data',Category::find($cate_id));
    }
    //PUT|PATCH | admin/category/{category} | category.update | App\Http\Controllers\CategoryController@update
    public function update($cate_id)
    {
        if (Category::where('id',$cate_id)->update(Input::except('_token','_method')))
            return redirect('admin/category');
        return back()->with('errors','修改分类信息失败,请稍后重试！');
    }
    //DELETE | admin/category/{category} | category.destroy | App\Http\Controllers\CategoryController@destroy
    public function destroy($cate_id)
    {
        return "成功访问destroy函数，参数为".$cate_id;
    }
}
