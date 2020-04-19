@extends('admin.layouts.app')

@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Post</h2>
                        </div>
                    </div>

                    @if($posts->count() > 0)
{{--                    <table class="table table-responsive-sm" id="myTable">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                        <th scope="col">#</th>--}}
{{--                        <th scope="col">Image</th>--}}
{{--                        <th scope="col">Title</th>--}}
{{--                        <th scope="col">Category</th>--}}
{{--                        <th scope="col">Published At</th>--}}
{{--                        <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}
{{--                        @php $i=1 @endphp--}}
{{--                        @foreach($posts as $post)--}}
{{--                        <tr>--}}
{{--                            <th>{{$i}}</th>--}}
{{--                            <td>--}}
{{--                                <img src="{{asset('storage/'.$post->image)}}" height="100" width="150">--}}
{{--                            </td>--}}
{{--                            <td width="30%">{{$post->title}}</td>--}}
{{--                            <td>{{$post->category->name}}</td>--}}
{{--                            <td>{{$post->published_at}}</td>--}}
{{--                            <td>--}}
{{--                                <form action="{{route('post.destroy',$post->id)}}" method="post">--}}
{{--                                    @if(!$post->trashed())--}}
{{--                                <a href="{{route('post.show',$post->id)}}">--}}
{{--                                    <button type="button" class="btn btn-primary rounded-pill">--}}
{{--                                       Show--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                    @endif--}}

{{--                                    @if(!$post->trashed())--}}
{{--                                <a href="{{route('post.edit',$post->id)}}">--}}
{{--                                    <button type="button" class="btn btn-warning rounded-pill">--}}
{{--                                        Edit--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                    @else--}}

{{--                                        <a href="{{route('post.restore',$post->id)}}">--}}
{{--                                        <button type="button" class="btn btn-warning rounded-pill">--}}
{{--                                            Restore--}}
{{--                                        </button>--}}
{{--                                        </a>--}}
{{--                                    @endif--}}

{{--                                <a href="{{route('post.destroy',$post->id)}}">--}}
{{--                                    @csrf--}}
{{--                                    @method("DELETE")--}}
{{--                                    <button type="submit" class="btn btn-danger rounded-pill">--}}
{{--                                        {{$post->trashed()?'Delete':'Trash'}}--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                </form>--}}
{{--                            <td>--}}
{{--                               @php $i++ @endphp--}}

{{--                        </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}


{{--                    </table>--}}

                        <table id="example" class="table table-responsive-xl js-dataTable-full-pagination">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Published At</th>
                                <th>Action</th>

                            </tr>

                            </thead>
                            <tbody>
                            <tr>
{{--                                <td>Tiger Nixon</td>--}}
{{--                                <td>System Architect</td>--}}
{{--                                <td>Edinburgh</td>--}}
{{--                                <td>61</td>--}}
{{--                                <td>2011/04/25</td>--}}
{{--                                <td>$320,800</td>--}}
                                <td></td><td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <img src="{{asset('storage/'.$post->image)}}" height="100" width="150">
                                    </td>
                                    <td width="30%">{{$post->title}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{$post->published_at}}</td>
                                    <td>
                                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                                            @if(!$post->trashed())
                                                <a href="{{route('post.show',$post->id)}}">
                                                    <button type="button" class="btn btn-primary rounded-pill">
                                                        Show
                                                    </button>
                                                </a>
                                            @endif

                                            @if(!$post->trashed())
                                                <a href="{{route('post.edit',$post->id)}}">
                                                    <button type="button" class="btn btn-warning rounded-pill">
                                                        Edit
                                                    </button>
                                                </a>
                                            @else

                                                <a href="{{route('post.restore',$post->id)}}">
                                                    <button type="button" class="btn btn-warning rounded-pill">
                                                        Restore
                                                    </button>
                                                </a>
                                            @endif

                                            <a href="{{route('post.destroy',$post->id)}}">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger rounded-pill">
                                                    {{$post->trashed()?'Delete':'Trash'}}
                                                </button>
                                            </a>
                                        </form>
                                    <td>
                                    @php $i++ @endphp

                                </tr>
                            @endforeach


                            </tbody>

                        </table>

                    @else
                        <h3>No Post Yet !!</h3>
                    @endif


                    {{$posts->links()}}
                </div>
            </div><!-- Page Content -->

@endsection
@section('script')
    @endsection