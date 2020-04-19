<?php

namespace App\Http\Controllers;

use App\Page_config;
use App\site_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.about.index')
            ->with('pages',Page_config::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Page_config $page_config)
    {
        //
          return view('admin.about.create')->with('page_config',$page_config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page_config $page_config)
    {
        //
        $data = [
            'title'=>$request->title,
            'short_intro'=>$request->short_intro,
        ];

        //Check if new image
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('posts');
            //DElete Old one
             Storage::delete($page_config->image);
        }else{
            $image =$page_config->image;
        }
        $data['image']=$image;
        //update other attributes

        $page_config->update($data);
        //flash and redirect
        session()->flash('success','Data Updated SucessFully');
        return redirect(route('page_config.index'));

    }

    public function site_config(Page_config $page_config){

        $site_config = site_details::find(1);
        return view('admin.about.site_config')
            ->with('site_config',$site_config);

    }

    public function site_config_update(Request $request){
        $site_config = site_details::find(1);
          $site_config->update($request->all());
          session()->flash('success','Site Has BeeN Updated');
          return redirect(route('home'));
    }


}
