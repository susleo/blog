<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('verifyIsAdmin')->only(['destroy']);
    }

    public function index()
    {
        //

        return view('admin.user.index')
            ->with('users',User::paginate(10));
    }

    public function create()
    {
        //
        return view('admin.user.edit');
    }

    public function store(CreateUserRequest $request, User $user)
    {
        //
          $data=[
              'name'=>$request->name,
              'email'=>$request->email,
              'password'=>$request->password,
              'role'=>$request->role,
              'about'=>$request->about,

          ];
          if($request->has('image')){
              $image = $request->image->store('user');
          }else{
              $image='blank';
          }
          $data['image']=$image;

          $user->create($data);

          session()->flash('success','NEW USER HASBEEN CREATED');
        return redirect(route('user.index'));
    }


    public function edit(User $user)
    {
        //
        return view('admin.user.edit')->with('user',$user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'about'=>$request->about,
        ];

        if($request->hasFile('image')){
            $image = $request->image->store('user');
              if($user->image != "blank"){
                  Storage::delete($user->image);
              }
        }else{
            if($user->image != "blank") {
                $image = $user->image;
            }else{
                $image="blank";
            }
        }

        if(auth()->user()->isAdmin()){
            $role = $request->role;
        }else{
            $role = $user->role;
        }

        if(empty($request->password)){
            $password = ($user->password);
        }else{
            $password = $request->password;
        }
           $data['image']=$image;
          $data['role' ]= $role;
          $data['password' ]= $password;
        $user->update($data);
        session()->flash('success','Profile Has Been Updated');
        if(auth()->user()->isAdmin()){
            return redirect(route('user.index'));
        }
            return redirect(route('home'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if($user->name == 'SurajFromLeo'){
            session()->flash('error','YOU CANNNOT DELETE THIS MOTHERFUCKER , YOU BITCH BETTER TRY NEXT TIME');
            return redirect()->back();
        }
          if($user_post = $user->posts->count()>0){
              session()->flash('error','USER HAS '.$user_post.' POSTS So First DELETE THAT POST');
          }else{
              $user->delete();
              session()->flash('success','USER HAS BEEN DELTED FROM THE SYSTEM');
              if($user->image != "blank"){
                  Storage::delete($user->image);

              }

          }
           return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
