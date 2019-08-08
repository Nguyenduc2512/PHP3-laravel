@extends('layout.main')
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add Category</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="{{route('cate.store')}}" method="post" enctype="multipart/form-data"
            xmlns="http://www.w3.org/1999/html">
            @csrf
            <div class=" form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{old('name')}}" placeholder="Enter title" class="form-control">
                @if($errors->first('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" value="" class="form-control">
                @if($errors->first('image'))
                <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="10" value="{{old('description')}}" class="form-control"></textarea>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-info">Save</button>
                <a href="{{route('catehome')}}" title="" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection