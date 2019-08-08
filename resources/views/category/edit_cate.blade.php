@extends('layout.main')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Category</h3>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form method="post" action="{{route('cate.update', $cates->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{old('name', $cates->name)}}"
                            placeholder="Enter title" class="form-control">
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
                        <textarea name="description" rows="10"
                            class="form-control">{!! old('description', $cates->description)!!}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info">Save</button>
                        <a title="" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection