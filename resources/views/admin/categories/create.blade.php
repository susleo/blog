@extends('admin.layouts.app')

@section('content')
<form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="post">
    @csrf
    @if(isset($category))
        @method("PUT")
    @endif
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" value="{{isset($category)?$category->name:''}}" name="name" aria-describedby="Category" placeholder="Enter Category">
    </div>
    <div class="form-group">
        <label for="category">Description (optional)</label>
        <input type="text" class="form-control" value="{{isset($category)?$category->description:''}}" name="description" aria-describedby="description" placeholder="Enter description">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection