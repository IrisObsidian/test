<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //GET|HEAD | admin/category | category.index | App\Http\Controllers\CategoryController@index
    public function index()
    {
        return view('category/index');
    }
    //GET|HEAD | admin/category/create | category.create | App\Http\Controllers\CategoryController@create
    public function create()
    {
        return view('category/create');
    }
}
