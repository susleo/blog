@extends('admin.layouts.app')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endsection
@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">User</h2>
                            @if(auth()->user()->isAdmin())
                            <div class="float-right">
                            <a href="{{route('user.create')}}">
                                <button type="button" class="btn btn-primary rounded-pill">Register New User</button>
                            </a>
                            </div>
                                @endif

                        </div>
                    </div>




                    @if($users->count() > 0)
                        <table id="example" class="table table-responsive-xl js-dataTable-full-pagination">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Posts</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
                        @php $i=1 @endphp
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>
{{--                                {{  Gravatar::get('email@example.com')}}--}}
                                @if($user->image == 'blank')

                                @if($user->role == 'admin')
                                    <img src="{{asset('assets/images/avatars/avatar4.jpg')}}" height="60" width="60" class="rounded-circle">
                                @else
                                    <img src="{{asset('assets/images/avatars/avatar3.png')}}" height="60" width="60" class="rounded-circle">
                                  @endif
                                 @else
                                    <img src="{{asset('storage/'.$user->image)}}" height="60" width="60" class="rounded-circle">
                                @endif
                            </td>
                            <td width="20%">{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->posts->count()}}</td>
                            <td>
                                @if(auth()->user()->isAdmin())
                                <input data-id="{{$user->id}}" class="toggle-class"
                                       type="checkbox" data-onstyle="success" data-offstyle="danger"
                                       data-toggle="toggle" data-on="Active"
                                       data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                                    @else
                                    @if($user->status=='0')
                                       <h2><span class="badge badge-danger">In Active</span></h2>
                                        @else
                                        <h2><span class="badge badge-success">Active</span></h2>
                                        @endif
                                @endif
                            </td>


                            <td>
                                <button type="button" class="btn btn-primary rounded-pill">
                                    Show
                                </button>
                                @if(auth()->user()->isAdmin())
                                <form action="{{route('user.destroy',$user->id)}}" method="post">

                                <a href="{{route('user.edit',$user->id)}}">
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
                                  @endif
                            <td>
                               @php $i++ @endphp

                        </tr>
                        @endforeach


                        </tbody>


                    </table>

                    @else
                        <h3>No Users Yet !!</h3>
                    @endif
         <div class="pagination-circle">
             {{$users->links()}}
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
                    url: 'changeStatus',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    @endsection