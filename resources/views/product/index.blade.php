@extends('layout.main')
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">List Products</h3>

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
                        <td>Name</td>
                        <td>Image</td>
                        <td width="400px">Details</td>
                        <td>Post_name</td>
                        <td>Publish_date</td>
                        <td>Status</td>
                        <td><a href="{{route('pro.add')}}" class="btn btn-sm btn-success">Add</a></td>
                    </tr>
                    @foreach($pro as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td><img src="{{$item->image}}" width="100"></td>
                        <td>{{$item->details}}</td>
                        <td><a href="{{route('pro.details', $item->id)}}">
                                @isset($item->post_name->title)
                                {{$item->post_name->title}}
                                @endisset</a></td>
                        <td>{{$item->publish_date}}</td>
                        <td>{{$item->status}}</td>
                        <td><a href="{{route('cate.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{route('pro.destroy', $item->id)}}" class=" btn btn-xs btn-danger"> Remove</a>
                    </tr>
                    @endforeach
                    <td colspan="7"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div>
@endsection