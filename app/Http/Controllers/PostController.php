<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Page_config;
use App\Post;
use App\site_details;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create','store']);
    }

    public function index()
    {
        //
        return view('admin.posts.index')->with('posts',Post::latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('admin.posts.create')
            ->with('categories',$categories)
            ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //upload the image
        //Create the post
        //flash a message then redirect

       $image = ($request->image->store('posts'));

       $data = [
           'title' => $request->title,
           'description' =>$request->description,
           'contents' =>$request->contents,
           'category_id'=>$request->category_id,
           'image'=>$image,
           'published_at'=>$request->published_at,
           'user_id'=>Auth::user()->id,
       ];

       $post = Post::create($data);
       $post->tags()->attach($request->tags);

       session()->flash('success','Post Created Success');
       return redirect(route('post.index'));

    }
    public function show(Post $post)
    {

        //page views Count
        $count = $post->views_count += 1;
        $post->save([
            'views_count' => $count
        ]);


        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();
        //Related Post

        $relatedWithCat = Post::all()
            ->where('category_id',$post->category->id)
            ->where('id', '!=', $post->id )
            ->take(1);
//        dd($relatedWithCat);
//        $tags = array();
//        foreach ($post->tags as $tag) {
//            $tags3[$tag->id] = $tag->name;
//        }
//        $relatedWithTag = Post::whereHas('tags', function ($query) use ($tags) {
//            $query->where('name', $tags3)
//         ;
//        })->where('id', '!=', $post->id )// So it won't fetch same post
//            ->get()->take(2);
//         dd($relatedWithTag);


        $post = Post::where('id', '=', $post->id)->first();

        $relatedWithTag = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name'));
        })
            ->where('id', '!=', $post->id) // So it won't fetch same post
            ->get()
            ->take(2);

        $categories = Category::all();
        $pop = Post::all()->sortBy('views_count')->take(3);
        return view('admin.posts.show')
            ->with('categories',$categories)
            ->with('tags',Tag::all())
            ->with('post',$post)
            ->with('about_intro',$about_intro)
            ->with('socail',$socail)
            ->with('popular_post',$pop)
            ->with('relatedWithCat',$relatedWithCat)
            ->with('relatedWithTag',$relatedWithTag);

    }
//
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        //
        $categories = Category::all();
        return view('admin.posts.create')
            ->with('categories',$categories)
            ->with('tags',Tag::all())
             ->with('post',$post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
//        $data = $request->only(['title','description','published_at','content']);

        $data = [
            'title'=>$request->title,
            'description'=>$request->description,
            'contents'=>$request->contents,
            'published_at'=>$request->published_at,
        ];

        //Check if new image
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('posts');
            //DElete Old one
            $post->deleteImage();
        }else{
            $image =$post->image;
        }

        $data['image']=$image;
        //update other attributes

        $post->update($data);
        $post->tags()->sync($request->tags);
         //flash and redirect
        session()->flash('success','Post Updated SucessFully');
        return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
           $post->deleteImage();
            $post->forceDelete();
        }else{
            $post->delete();
        }

        session()->flash('success','Post has been Deleted');

            return redirect(route('post.index'));

    }

    public function trashed(){

        $trashed = Post::onlyTrashed()->get();
        return view('admin.posts.index')
            ->with('posts',$trashed);

    }

    public function restore($id){
        $trashed = Post::onlyTrashed()->where('id',$id)->first();
        $trashed->restore();
        session()->flash('success','Post has been Restored');

        return redirect(route('post.index'));

    }

}
