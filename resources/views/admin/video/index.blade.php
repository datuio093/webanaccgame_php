@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection

<div class="row justify-content-center ">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Game</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('video.create')}}" class="btn btn-success"> Thêm Danh Mục Game</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Tên </th>
                      <th>Description</th>
                      <th>Slug</th>
                      <th>Hiển Thị</th>
                      <th>Hình Ảnh</th>
                      <th>Link</th>
                      <th></th>
                 
                    </tr>

                    @foreach ($video as $key => $blg)
                    <tr>
                        <td>{{$key}}</td>
                        <td style="max-width: 100px">{{$blg->title}}</td>
                        <td style="max-width: 100px">{{$blg->description}}</td>
                        <td style="max-width: 100px">{{$blg->slug}}</td>
                     
                      
                        <td>
                           @if ($blg->status == 0)
                               Không Hiển Thị
                           @else
                                Hiển Thị
                           @endif
                               
                        </td>
                        <td> <img height="150px" width="150px" src="{{asset('uploads/video/'.$blg->image)}}" alt=""> </td>
              
                        <td style="max-width: 300px">{!!$blg->link!!}</td>
                        {{-- <td> 
                            <form action="{{route('video.destroy',[$blg->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('video.edit'/*, $blg->id*/)}}" class="btn btn-warning"> Sửa</a> </td> --}}
                      </tr>
                    @endforeach
             
                  </table>
                             
            </div>
        </div>
    </div>
</div>

@endsection