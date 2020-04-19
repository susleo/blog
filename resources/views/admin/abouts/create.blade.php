@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
@endsection
@section('content')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="page-title">{{isset($about)?'Edit About':'Create About'}}</h2>
                            </div>
                        </div>



                        <form action="{{isset($about)?route('about.update',$about->id):route('about.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($about))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="name" value="{{isset($about)?$about->title:''}}" name="title">
                            </div>

                            <label for="title">Description</label>
                            <div class="form-group">
                                <input id="description" type="hidden" name="description"  value="{{isset($about)?$about->description:''}}">
                                <trix-editor input="description">
                                </trix-editor>
                                </div>


                            <label for="content">Image</label>
                            <div class="form-group">
                                @if(isset($about))
                                    <img src="{{asset('storage/'.$about->image)}}" alt="" height="250px" width="300px" class="rounded-circle">
                                 @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                </div>
            </div><!-- Page Content -->


@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script>
        $('trix-editor').css("min-height", "350px");
    </script>
@endsection
