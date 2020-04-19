@extends('admin.layouts.app')


@section('content')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="page-title">{{isset($user)?'Edit User':'Register User'}}</h2>
                            </div>
                        </div>



                        <form action="{{isset($user)?route('user.update',$user->id):route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($user))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" id="name" value="{{isset($user)?$user->name:''}}" name="name">
                            </div>


                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="email" class="form-control" id="email" value="{{isset($user)?$user->email:''}}" name="email">
                            </div>


                            <div class="form-group">
                                <label for="title">{{isset($user)?'New Password(Leave Empty If You Dont Want To Change)':'Password'}}</label>
                                <input type="password" class="form-control"
                                       id="password" value="" name="password">
                            </div>

                            @if(auth()->user()->isAdmin())
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control custom-select" id="role" name="role">

                                    <option value="admin"
                                            @if(isset($user))
                                            @if($user->role != 'writer') selected
                                            @endif
                                            @endif
                                    >Admin</option>
                                    <option value="writer"
                                            @if(isset($user))
                                            @if($user->role == 'writer') selected
                                            @endif
                                            @endif
                                    >Writer</option>
                                </select>
                            </div>
                            @endif


                            <label for="content">Image</label>
                            <div class="form-group">
                                @if(isset($user))
                                    <img src="{{asset('storage/'.$user->image)}}" alt="" height="250px" width="300px" class="rounded-circle">
                                 @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <label for="title">About</label>
                                <input type="text" class="form-control" id="about" value="{{isset($user)?$user->about:''}}" name="about">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                </div>
            </div><!-- Page Content -->


@endsection

@section('script')

    @endsection
