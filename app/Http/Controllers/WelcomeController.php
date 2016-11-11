<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //首页
    public function index()
    {
        return view('welcome')->with('category',Category::all());
    }
}
