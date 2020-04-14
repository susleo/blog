@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endsection

@section('content')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="page-title">{{isset($post)?'Edit Post' : 'Create Post'}}</h2>
                            </div>
                        </div>



                        <form action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($post))
                                @method('PUT')
                                @endif
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" value="{{isset($post)?$post->title:''}}" name="title">
                            </div>


                            <div class="form-group">
                                <label for="title">Description</label>
                                <input type="text" class="form-control" id="description" value="{{isset($post)?$post->description:''}}" name="description">
                            </div>

                            <div class="form-group">
                                <label for="Category">Category</label>
                                <select class="form-control custom-select" id="category" name="category_id">
                                    <option>Select</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}"
                                                @if(isset($post))
                                        @if($post->category_id==$cat->id)
                                            selected
                                            @endif
                                                  @endif
                                            >{{$cat->name}}</option>
                                        @endforeach

                                </select>
                            </div>

                            <label for="content">Content</label>
                            <div class="form-group">
                                <input id="contents" type="hidden" name="contents" value="{{isset($post)?$post->contents:''}}"contente>
                                <trix-editor input="contents">
                                </trix-editor>
                               </div>


                            <label for="content">Image</label>
                            <div class="form-group">
                                @if(isset($post))
                                    <img src="{{asset('storage/'.$post->image)}}" alt="" height="250px" width="300px">
                                @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <label for="published_at">Published At</label>
                                <input type="text" class="form-control" id="published_at" name="published_at" value="{{isset($post)?$post->published_at:''}}">
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
    @endsection
