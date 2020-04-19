@extends('admin.layouts.app')

@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">About Details</h2>
                        </div>
                    </div>


                        <table id="example" class="table table-responsive-xl js-dataTable-full-pagination">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title </th>
                                <th scope="col">Short Intro</th>
                                <th scope="col">Image</th>
                                <th>Action</th>

                            </tr>

                            </thead>
                            <tbody>
                            <tr>
                                <td></td><td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($pages as $post)
                                <tr>
                                    <td>{{$i}}</td>

                                    <td width="30%">{{$post->title}}</td>
                                    <td>{{$post->short_intro}}</td>
                                    <td>
                                        <img src="{{asset('storage/'.$post->image)}}" height="200" width="250">
                                    </td>
                                    <td>
                                                <a href="{{route('page_config.edit',$post->id)}}">
                                                    <button type="button" class="btn btn-warning rounded-pill">
                                                        Edit
                                                    </button>
                                                </a>
                                    <td>
                                    @php $i++ @endphp

                                </tr>
                            @endforeach


                            </tbody>

                        </table>

                </div>
            </div><!-- Page Content -->

@endsection
@section('script')
    @endsection