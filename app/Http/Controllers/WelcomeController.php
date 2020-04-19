<?php

namespace App\Http\Controllers;

use App\About;
use App\Page_config;
use App\site_details;
use App\Team;
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
        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();
         return view('welcome',compact('posts','categories','tags','RandomPost1','about_intro','socail'));
    }


    public function category(Category $category){
        $categories = Category::all();
        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();
        return view('admin.categories.show')
            ->with('categories',$categories)
            ->with('category',$category)
            ->with('about_intro',$about_intro)
            ->with('socail',$socail)
            ->with('posts',$category->posts()->paginate(9));
    }

    public function tag(Tag $tag){

        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();
        $categories = Category::all();
        return view('admin.tags.show')
            ->with('categories',$categories)
            ->with('about_intro',$about_intro)
            ->with('socail',$socail)
            ->with('tag',$tag)
            ->with('posts',$tag->posts()->paginate(9));
    }


    public function about(){
        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();
        $categories = Category::all();
        $teams = Team::all()->where('status',1);
       $about_intro = Page_config::all()->where('id','1');
        $team_intro = Page_config::all()->where('id','3');
        return view('admin.abouts.show')
            ->with('categories',$categories)
            ->with('about_intro',$about_intro)
            ->with('team_intro',$team_intro)
            ->with('socail',$socail)
            ->with('abouts1',About::all()->where('id','1'))
            ->with('abouts2',About::all()->where('id','2'))
            ->with('teams',$teams)
            ->with('about_intro',$about_intro)
           ;
    }
    public function footer()
    {
        $categories = Category::all();
        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();

        return view('frontend.inc.footer_about',compact('categories','about_intro','socail'));

    }






}
