@extends('admin.layouts.app')

@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Tags</h2>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="post" id="deleteForm">
                                @csrf
                                @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">DELETING TAG</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  Are You Sure Want to Delete this ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-text-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-text-danger">Yes ! 100% Sure</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>


                    <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="post">
                        @csrf
                        @if(isset($tag))
                            @method("PUT")
                            @endif
                        <div class="form-group">
                            <label for="category">Tag</label>
                            <input type="text" class="form-control" value="{{isset($tag)?$tag->name:''}}" name="name" aria-describedby="Tag" placeholder="Enter Tag">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>




                    @if(!isset($tag))

                        @if($tags->count() > 0)

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Posts</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        @php $i=1 @endphp
                        @foreach($tags as $t)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$t->name}}</td>
                            <td><h3><span class="badge badge-primary">{{$t->posts->count()}}</span></h3></td>

                            <td>
                                <a href="{{route('tags.edit',$t->id)}}">
                                    <button type="button" class="btn btn-warning rounded-pill">Edit</button>
                                </a>
                                <button type="button" class="btn btn-danger rounded-pill"  onclick="handleDelete({{$t->id}})">Delete</button>
                            <td>
                               @php $i++ @endphp

                        </tr>
                        @endforeach


                        </tbody>
                    </table>

                        @else
                            <h3> <br>No Tags Yet !!</h3>
                        @endif
                    @endif


                </div>
            </div><!-- Page Content -->
            


@endsection

@section('script')
    <script>
        function handleDelete(id){
            //console.log(id);
            var form = document.getElementById('deleteForm');
            form.action = 'tags/'+ id ;
             console.log(form);
            $('#deleteModal').modal('show')
            // data-toggle="modal" data-target="#deleteModal"
        }
    </script>

    @endsection