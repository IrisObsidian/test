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
        $data = Category::orderBy('updated_at','asc')->get();
        if (count($data) == 0)
            return view('category/create')->with('errors','您尚无分类，请添加！');
        return view('category/index')->with('data',$data);
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
            return $status = 1;
        return $status = 0;
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
//        if (Category::where('id',$cate_id)->delete())
//            if (count(Category::all())>0)
//                return $data = ['status'=>1,'id'=>$cate_id,'msg'=>'分类删除成功'];
//            else
//                return redirect('admin/category')->with('errors','您尚无分类，请添加！');
//        else
//            return $data = ['status'=>0,'msg'=>'分类删除失败'];
        if (Category::where('id',$cate_id)->delete())
            return $data = ['status'=>1,'id'=>$cate_id,'msg'=>'分类删除成功'];
        return $data = ['status'=>0,'msg'=>'分类删除失败'];
    }
}
