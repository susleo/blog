@extends('admin.layouts.app')

@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Categories</h2>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure Want To Delete ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Woohoo, you're reading this text in a modal!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-text-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-text-danger">Yes ! 100% Sure</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="post">
                        @csrf
                        @if(isset($category))
                            @method("PUT")
                            @endif
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" value="{{isset($category)?$category->name:''}}" name="name" aria-describedby="Category" placeholder="Enter Category">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    @if(!isset($category))
                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Categories</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>

                        @php $i=1 @endphp
                        @foreach($categories as $cat)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="{{route('categories.edit',$cat->id)}}">
                                    <button type="button" class="btn btn-warning rounded-pill">Edit</button>
                                </a>

                            <td>
                            <td>
                                <button type="button" class="btn btn-danger rounded-pill"  onclick="handleDelete({{$cat->id}})">Delete</button>

                            <td>

                               @php $i++ @endphp


                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                    @endif
                </div>
            </div><!-- Page Content -->
            


@endsection

@section('script')
    <script>
        function handleDelete(id){
            //console.log(id);
            var form = document.getElementById('deleteForm');
            form.action = 'categories/'+ id ;
             console.log(form);
            $('#deleteModal').modal('show')
            // data-toggle="modal" data-target="#deleteModal"
        }
    </script>

    @endsection