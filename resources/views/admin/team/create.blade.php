@extends('admin.layouts.app')


@section('content')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="page-title">{{isset($team)?'Edit Team':'Register Team'}}</h2>
                            </div>
                        </div>


                        <form action="{{isset($team)?route('team.update',$team->id):route('team.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($team))
                                @method('PUT')
                            @endif

                            <label for="content">Image</label>
                            <div class="form-group">
                                @if(isset($team))
                                    <img src="{{asset('storage/'.$team->image)}}" alt="" height="250px" width="300px" class="rounded-circle">
                                @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" id="name" value="{{isset($team)?$team->name:''}}" name="name">
                            </div>


                            <div class="form-group">
                                <label for="title">Short Intro</label>
                                <input type="text" class="form-control" id="email" value="{{isset($team)?$team->short_intro:''}}" name="short_intro">
                            </div>


                            <div class="form-group">
                                <label for="title">Facebook Profile</label>
                                <input type="text" class="form-control" id="about" value="{{isset($team)?$team->facebook:''}}" name="facebook">
                            </div>


                            <div class="form-group">
                                <label for="title">Instagram Profile</label>
                                <input type="text" class="form-control" id="about" value="{{isset($team)?$team->instagram:''}}" name="instagram">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                </div>
            </div><!-- Page Content -->


@endsection

@section('script')

    @endsection
