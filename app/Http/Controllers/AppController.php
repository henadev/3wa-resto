<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AppController extends Controller
{
    public function welcome(){
        $categories = Category::all();
        return view('welcome',['categories' => $categories]);
    }
    public function aboutPage(){
        return view( ' about ', [ 'message' => 'this is About page ...' ] );
    }
}
