@extends('admin.layouts.app')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endsection
@section('content')



                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">About Us Details</h2>
                            <div class="float-right">
{{--                            <a href="{{route('about.create')}}">--}}
{{--                                <button type="button" class="btn btn-primary rounded-pill">Create New About</button>--}}
{{--                            </a>--}}
                            </div>

                        </div>
                    </div>

                    @if($abouts->count() > 0)
                    <table class="table table-responsive-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $i=1 @endphp
                        @foreach($abouts as $about)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>
                                    <img src="{{asset('storage/'.$about->image)}}" height="300" width="250">
                            </td>
                            <td width="20%">{{$about->title}}</td>
                            <td>
                                <input data-id="{{$about->id}}" class="toggle-class"
                                       type="checkbox" data-onstyle="success" data-offstyle="danger"
                                       data-toggle="toggle" data-on="Active"
                                       data-off="InActive" {{ $about->status ? 'checked' : '' }}>
                            </td>
                            <td>
                                <form action="{{route('about.destroy',$about->id)}}" method="post">

                                <a href="{{route('about.edit',$about->id)}}">
                                    <button type="button" class="btn btn-warning rounded-pill">
                                        Edit
                                    </button>
                                </a>
                                    @csrf
                                    @method("DELETE")
{{--                                    <button type="submit" class="btn btn-danger rounded-pill">--}}
{{--                                        Delete--}}
{{--                                    </button>--}}

                                </form>
                            <td>
                               @php $i++ @endphp

                        </tr>
                        @endforeach


                        </tbody>


                    </table>

                    @else
                        <h3>No About us Yet !!</h3>
                    @endif

                </div>
            </div><!-- Page Content -->


@endsection
@section('script')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        // $(function() {
        //     $('.toggle-class').change(function() {
        //
        //
        //         // var status = $(this).prop('checked') == true ? 1 : 0;
        //         // var id = $(this).data('id');
        //         //
        //         // $.ajax({
        //         //     type: "GET",
        //         //     dataType: "json",
        //         //     url: 'AboutchangeStatus',
        //         //     data: {'status': status, 'id': id},
        //         //     success: function(data){
        //         //         console.log(data.success)
        //         //     }
        //         // });
        //     })
        // })
    </script>
    @endsection