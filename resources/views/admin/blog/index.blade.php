@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection

<div class="row justify-content-center ">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Game</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('blog.create')}}" class="btn btn-success"> Thêm Blog</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Tên </th>
                      <th>Content</th>
                      <th>Slug</th>
                      <th>Mô Tả</th>
                      <th>Loại</th>
                      <th>Hiển Thị</th>
                      <th>Hình Ảnh</th>
                  
                      <th></th>
                 
                    </tr>

                    @foreach ($blog as $key => $blg)
                    <tr>
                        <td>{{$key}}</td>
                        <td style="max-width: 100px">{{$blg->title}}</td>
                        <td style="max-width:500px"> {!!$blg->content!!} </td>
                        <td style="max-width: 100px">{{$blg->slug}}</td>
                        <td style="max-width: 300px">{!!$blg->description!!}</td>
                        <td>
                            @if ($blg->kind_of_blog == 'blogs')
                                Blogs
                            @else
                                Hưỡng Dẫn
                            @endif
                                
                         </td>
                        <td>
                           @if ($blg->status == 0)
                               Không Hiển Thị
                           @else
                                Hiển Thị
                           @endif
                               
                        </td>
                        <td> <img height="150px" width="150px" src="{{asset('uploads/blog/'.$blg->image)}}" alt=""> </td>
              
                
                        <td> 
                            <form action="{{route('blog.destroy',[$blg->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('blog.edit', $blg->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$blog->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection