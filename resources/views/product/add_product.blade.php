@extends('layout.main')
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add Products</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="{{route('pro.store')}}" method="post" enctype="multipart/form-data"
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
                <label>Details</label>
                <textarea name="details" rows="10" value="{{old('details')}}" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <label>Publish Date</label>
                <input type="date" name="publish_date" value="" class="form-control">
                @if($errors->first('publish_date'))
                <span class="text-danger">{{$errors->first('publish_date')}}</span>
                @endif
            </div>

            <div class="form-group">
            <label>Post_ID</label>
                 <select name="post_id" class="form-control">
                    @foreach($posts as $au)
                    <option value="{{$au->id}}"></option>
                    @endforeach
                </select>
            </div>

           <div class="checkbox">
                <label>
                    <input type="checkbox" name="status" value="1"> Enable
                </label>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-info">Save</button>
                <a href="{{route('pro.home')}}" title="" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection