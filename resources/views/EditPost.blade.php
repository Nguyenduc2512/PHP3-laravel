@extends('layout.main')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Post</h3>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form method="post" action="{{route('post.update', $posts->id)}}" enctype="multipart/form-data" >
                    @csrf
                    <div class=" form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{old('title', $posts->title)}}"
                            placeholder="Enter title" class="form-control">
                        @if($errors->first('title'))
                        <span class="text-danger">{{$errors->first('title')}}</span>
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
                        <label>Content</label>
                        <textarea name="content" rows="10"
                            class="form-control">{!! old('content', $posts->content)!!}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($cates as $ca)
                            <option value="{{$ca->id}}" @if($ca->id == $posts->category_id)
                                selected
                                @endif >
                                {{$ca->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <select name="author_id" class="form-control">
                            @foreach($author as $au)
                            <option value="{{$au->id}}" @if($ca->id == $posts->category_id)
                                selected
                                @endif >{{$au->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>public-date</label>
                        <input type="date" name="publish_date" value="{{old('publish_date', $posts->publish_date)}}"
                            class="form-control">
                        @if($errors->first('publish_date'))
                        <span class="text-danger">{{$errors->first('publish_date')}}</span>
                        @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" @if($posts->status)
                            checked
                            @endif
                            name="status" value="1"> Enable
                        </label>
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