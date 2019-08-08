@extends('layout.main')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">List Post</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>Image</td>
                        <td width="400px">Content</td>
                        <td>Author_Name</td>
                        <td>Public date</td>
                        <td>Cate_name</td>
                        <td>Status</td>
                        <td><a href="{{route('post.add')}}" class="btn btn-sm btn-success">Add</a></td>
                    </tr>
                    @foreach($posts as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td><img src="{{$item->image}}" width="100"></td>
                        <td>{{$item->content}}</td>
                        <td>@isset($item->user->name)
                            {{$item->user->name}}
                            @endisset</td>
                        <td>{{$item->publish_date}}</td>
                        <td>@isset($item->catename->name)
                            {{$item->catename->name}}
                            @endisset</td>
                        <td>{{$item->status}}</td>
                        <td><a href="{{route('post.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{route('postdetele', $item->id) }}" class=" btn btn-xs btn-danger "> Remove</a>
                    </tr>
                    @endforeach
                    <td colspan="7"></td>
                    </tr>
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div>
@endsection