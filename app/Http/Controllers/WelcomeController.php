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


    public function category(Category $category){
        $categories = Category::all();
        return view('admin.categories.show')
            ->with('categories',$categories)
            ->with('category',$category)
            ->with('posts',$category->posts()->paginate(9));
    }

    public function tag(Tag $tag){
        $categories = Category::all();
        return view('admin.tags.show')
            ->with('categories',$categories)
            ->with('tag',$tag)
            ->with('posts',$tag->posts()->paginate(9));
    }



}
