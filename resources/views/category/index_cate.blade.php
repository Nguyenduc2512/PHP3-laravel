
@extends('layout.main')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">List Category</h3>

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
                        <td>Description</td>
                        <td><a href="{{route('cate.add')}}" class="btn btn-sm btn-success">Add</a></td>
                    </tr>
                    @foreach($cates as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td><img src="{{$item->image}}" width="100"></td>
                            <td>{{$item->description}}</td>
                            <td><a href="{{route('cate.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{route('catedetele', $item->id)}}" class=" btn btn-xs btn-danger" > Remove</a>
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
