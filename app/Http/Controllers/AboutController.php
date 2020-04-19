<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.abouts.index')
            ->with('abouts',About::all());
    }

    public function create()
    {
        //
        return view('admin.abouts.create');

    }

    public function store(Request $request , About $about)
    {
        //
        $data=[
            'title'=>$request->title,
            'description'=>$request->description,

        ];
        if($request->has('image')){
            $image = $request->image->store('post');
        }else{
            $image='blank';
        }
        $data['image']=$image;

        $about->create($data);

        session()->flash('success','NEW About HASBEEN CREATED');
        return redirect(route('about.index'));

    }

    public function edit(About $about)
    {
        //
        return view('admin.abouts.create')
            ->with('about',$about);
    }

    public function update(Request $request, About $about)
    {
        //

        $data=[
            'title'=>$request->title,
            'description'=>$request->description,

        ];
        if($request->has('image')){
            $image = $request->image->store('post');
            Storage::delete($about->image);
        }else{
            $image='blank';
        }
        $data['image']=$image;

        $about->update($data);

        session()->flash('success',' About HASBEEN Updated');
        return redirect(route('about.index'));

    }

    public function changeStatus(Request $request)
    {
        $about = About::find($request->id);
        $about->status = $request->status;
        $about->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy(About $about)
    {
        //
        $about->delete();
        session()->flash('success','About HAS BEEN DELTED FROM THE SYSTEM');
        if($about->image != "blank.jpg"){
            Storage::delete($about->image);
        }

    }
}
