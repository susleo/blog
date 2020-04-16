<?php

namespace App\Http\Controllers;

use DB;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){

        if(\request()->query('search')){
            $search = request()->query('search');
            $RandomPost1 =Post::where('title','LIKE',"%{$search}%")->paginate(6);
        }else{
            $RandomPost1 = Post::where('deleted_at',null)->inRandomOrder()->take(6)->get();
        }


        $posts= Post::paginate(6);
        $categories = Category::all();
        $tags = Tag::all();
         return view('welcome',compact('posts','categories','tags','RandomPost1'));
    }



}
