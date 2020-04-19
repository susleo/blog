@extends('admin.layouts.app')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endsection
@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Team</h2>
                            <div class="float-right">
                            <a href="{{route('team.create')}}">
                                <button type="button" class="btn btn-primary rounded-pill">Register New Team</button>
                            </a>
                            </div>

                        </div>
                    </div>




                    @if($teams->count() > 0)
                        <table id="example" class="table table-responsive-xl js-dataTable-full-pagination">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Short Intro</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
                        @php $i=1 @endphp
                        @foreach($teams as $team)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>
                                @if($team->image == 'blank.jpg')
                                    <img src="{{asset('assets/images/avatars/avatar4.jpg')}}" height="60" width="60" class="rounded-circle">
                                 @else
                                    <img src="{{asset('storage/'.$team->image)}}" height="60" width="60" class="rounded-circle">
                                @endif
                            </td>
                            <td width="20%">{{$team->name}}</td>
                            <td>{{$team->short_intro}}</td>
                            <td>
                                <input data-id="{{$team->id}}" class="toggle-class"
                                       type="checkbox" data-onstyle="success" data-offstyle="danger"
                                       data-toggle="toggle" data-on="Active"
                                       data-off="InActive" {{ $team->status ? 'checked' : '' }}>
                            </td>

                            <td>
                                <form action="{{route('team.destroy',$team->id)}}" method="post">

                                <a href="{{route('team.edit',$team->id)}}">
                                    <button type="button" class="btn btn-warning rounded-pill">
                                        Edit
                                    </button>
                                </a>
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger rounded-pill">
                                        Delete
                                    </button>

                                </form>
                            <td>
                               @php $i++ @endphp

                        </tr>
                        @endforeach


                        </tbody>


                    </table>

                    @else
                        <h3>No Teams Yet !!</h3>
                    @endif
         <div class="pagination-circle">
             {{$teams->links()}}
         </div>

                </div>
            </div><!-- Page Content -->


@endsection
@section('script')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'teamChangeStatus',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    @endsection