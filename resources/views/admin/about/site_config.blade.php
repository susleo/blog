@extends('admin.layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title">Site Config </h2>
            </div>
        </div>

        <form action="{{route('site_config_update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Site Name</label>
                <input type="text" class="form-control" id="title" value="{{$site_config->site_name}}" name="site_name">
            </div>


            <div class="form-group">
                <label for="title">Address</label>
                <input type="text" class="form-control" id="description" value="{{$site_config->address}}" name="address">
            </div>

            <div class="form-group">
                <label for="title">Phone</label>
                <input type="text" class="form-control" id="description" value="{{$site_config->phone}}" name="phone">
            </div>

            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" id="description" value="{{$site_config->email}}" name="email">
            </div>

            <div class="form-group">
                <label for="title">Facebook</label>
                <input type="text" class="form-control" id="description" value="{{$site_config->facebook}}" name="facebook">
            </div>

            <div class="form-group">
                <label for="title">Instagram</label>
                <input type="text" class="form-control" id="description" value="{{$site_config->instagram}}" name="instagram">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>




    </div>
    </div><!-- Page Content -->


@endsection


