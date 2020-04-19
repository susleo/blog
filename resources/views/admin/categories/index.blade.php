@extends('admin.layouts.app')

@section('content')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Categoreis </h2>
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
                                    <h5 class="modal-title" id="exampleModalLabel">DELETING CATEGORIES</h5>
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



                    @if($categories->count() < 1)
                       @if(request()->url()==route('categories.trashed'))
                             <h3> <br> No Trashed Categories Yet !!</h3>
                        @else
                        <h3> <br>  No Categories Yet !!</h3>
                            @endif
                    @else
                     <table id="example" class="table table-responsive-xl js-dataTable-full-pagination">
                        <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Posts</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>

                        @php $i=1 @endphp
                        @foreach($categories as $cat)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$cat->name}}</td>
                            <td><h3><span class="badge badge-primary">{{$cat->posts->count()}}</span></h3></td>

                            <td>
                                @if(!$cat->trashed())
                                <a href="{{route('categories.edit',$cat->id)}}">
                                    <button type="button" class="btn btn-warning rounded-pill">Edit</button>
                                </a>
                                @else
                                    <a href="{{route('categories.restore',$cat->id)}}">
                                        <button type="button" class="btn btn-warning rounded-pill">Restore</button>
                                    </a>
                                @endif
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