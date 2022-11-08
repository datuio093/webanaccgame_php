@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection

<div class="row justify-content-center ">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Slider</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('slider.create')}}" class="btn btn-success"> Thêm Slider</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Tên Danh Mục</th>
                
                      <th>Mô Tả</th>
                      <th>Hiển Thị</th>
                      <th>Hình Ảnh</th>
                      <th>Quản Lý</th>
                      <th></th>
                 
                    </tr>

                    @foreach ($slider as $key => $slie)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$slie->title}}</td>
                        <td>{{$slie->slug}}</td>
                        <td>{{$slie->description}}</td>
                        <td>
                           @if ($slie->status == 0)
                               Không Hiển Thị
                           @else
                                Hiển Thị
                           @endif
                               
                        </td>
                        <td> <img height="150px" width="150px" src="{{asset('uploads/slider/'.$slie->image)}}" alt=""> </td>
                        <td>{{$slie->title}}</td>
                
                        <td> 
                            <form action="{{route('slider.destroy',[$slie->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('slider.edit', $slie->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$slider->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection