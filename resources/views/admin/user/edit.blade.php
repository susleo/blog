@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{asset('assets/plugins/select2/css/select2-material.css')}}" rel="stylesheet">
@endsection

@section('content')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="page-title">Edit User</h2>
                            </div>
                        </div>



                        <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name">
                            </div>


                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">
                            </div>

                            @if(auth()->user()->isAdmin())
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control custom-select" id="role" name="role">
                                    <option value="admin" @if($user->role != 'writer') selected @endif>Admin</option>
                                    <option value="writer" @if($user->role == 'writer') selected @endif >Writer</option>
                                </select>
                            </div>
                            @else
                                <div class="form-group">
                                    <label for="title">Password</label>
                                    <input type="password" class="form-control" id="password" value="{{$user->password}}" name="password">
                                </div>

                            @endif

                            <label for="content">Image</label>
                            <div class="form-group">
                                    <img src="{{asset('storage/'.$user->image)}}" alt="" height="250px" width="300px" class="rounded-circle">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <label for="title">About</label>
                                <input type="text" class="form-control" id="about" value="{{$user->about}}" name="about">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                </div>
            </div><!-- Page Content -->


@endsection

@section('script')

    @endsection
