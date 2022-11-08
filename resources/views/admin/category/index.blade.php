@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection

<div class="row justify-content-center ">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Game</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('category.create')}}" class="btn btn-success"> Thêm Danh Mục Game</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Tên Danh Mục</th>
                      <th>Slug Danh Mục</th>
                      <th>Mô Tả</th>
                      <th>Hiển Thị</th>
                      <th>Hình Ảnh</th>
                      <th>Quản Lý</th>
                      <th></th>
                 
                    </tr>

                    @foreach ($category as $key => $cate)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$cate->title}}</td>
                        <td>{{$cate->slug}}</td>
                        <td>{{$cate->description}}</td>
                        <td>
                           @if ($cate->status == 0)
                               Không Hiển Thị
                           @else
                                Hiển Thị
                           @endif
                               
                        </td>
                        <td> <img height="150px" width="150px" src="{{asset('uploads/category/'.$cate->image)}}" alt=""> </td>
                        <td>{{$cate->title}}</td>
                
                        <td> 
                            <form action="{{route('category.destroy',[$cate->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$category->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection