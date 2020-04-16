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
        $posts= Post::paginate(6);
        $popular_post= Post::get()->sortByDesc('view_count');
        $RandomPost1 = Post::where('deleted_at',null)->inRandomOrder()->take(6)->get();

        $categories = Category::all();
        $tags = Tag::all();
         return view('welcome',compact('posts','categories','tags','RandomPost1'));
    }



}
