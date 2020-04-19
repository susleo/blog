<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $team = Team::paginate(8);
        return view('admin.team.index')->with('teams',$team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Team $team)
    {
        //
        $data=[
            'name'=>$request->name,
            'short_intro'=>$request->short_intro,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'status'=>0,
        ];
        if($request->has('image')){
            $image = $request->image->store('posts');
        }else{
            $image='blank.jpg';
        }
        $data['image']=$image;

        $team->create($data);

        session()->flash('success','NEW TEAM HASBEEN CREATED');
        return redirect(route('team.index'));
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
    public function edit(Team $team)
    {
        //
        return view('admin.team.create')->with('team',$team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $data=[
            'name'=>$request->name,
            'short_intro'=>$request->short_intro,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'status'=>$team->status,
        ];
        if($request->has('image')){
            $image = $request->image->store('posts');
            Storage::delete($team->image);
        }else{
            $image='blank.jpg';
        }
        $data['image']=$image;

        $team->update($data);

        session()->flash('success','NEW TEAM HASBEEN Updated');
        return redirect(route('team.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();
        session()->flash('success','TEEM HAS BEEN DELTED FROM THE SYSTEM');
        if($team->image != "blank.jpg"){
            Storage::delete($team->image);

        }
    }

    public function changeStatus(Request $request)
    {
        $user = Team::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
