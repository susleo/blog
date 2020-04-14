<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts',Post::all());
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
        return view('admin.posts.create')->with('categories',$categories);
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

       ];

       Post::create($data);
       session()->flash('success','Post Created Success');
       return redirect(route('post.index'));




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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

        $date = [
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
