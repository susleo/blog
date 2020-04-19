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
                                <h2 class="page-title">{{isset($page_config)?'Edit Details' : 'Create Post'}}</h2>
                            </div>
                        </div>



                        <form action="{{isset($page_config)?route('page_config.update',$page_config->id):route('page_config.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($page_config))
                                @method('PUT')
                                @endif
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" value="{{isset($page_config)?$page_config->title:''}}" name="title">
                            </div>


                            <div class="form-group">
                                <label for="title">Short Intro</label>
                                <input type="text" class="form-control" id="description" value="{{isset($page_config)?$page_config->short_intro:''}}" name="short_intro">
                            </div>


                            <label for="content">Image</label>
                            <div class="form-group">
                                @if(isset($page_config))
                                    <img src="{{asset('storage/'.$page_config->image)}}" alt="" height="250px" width="300px">
                                @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                </div>
            </div><!-- Page Content -->


@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#tags').select2();

        });
    </script>
    @endsection
