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

                <a href="{{route('nick.create')}}" class="btn btn-success"> Thêm Danh Mục Game</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Thư Viện Ảnh</th>
                      <th>Tên Nick</th>
                      <th>Mã Số</th>
                      <th>Mô Tả</th>
                      <th>Hiển Thị</th>
                      <th>Hình Ảnh</th>
                      <th>Thuộc Game</th>
                      <th>Thuộc Tính</th>
                      <th>Quản Lý</th>
        
                    </tr>

                    @foreach ($nicks as $key => $blg)
                    <tr>
                        <td>{{$key}}</td>
                        <td>  <a href="{{route('gallery.edit', [$blg->id])}}" class="btn btn-success btn-sm">Thêm Thư Viện Ảnh </a> </td>
                        <td style="max-width: 100px">{{$blg->title}}</td>
                        <td style="max-width: 100px">{{$blg->ms}}</td>
                        <td style="max-width: 400px">{!!$blg->description!!}</td>

  
            
                        <td>
                           @if ($blg->status == 0)
                               Không Hiển Thị
                           @else
                                Hiển Thị
                           @endif
                               
                        </td>
                
                        <td> <img height="150px" width="150px" src="{{asset('uploads/nicks/'.$blg->image)}}" alt=""> </td>
                        <td> {{$blg->category->title}} </td>
                        <td style="width:100px">
                            @php
                            $attribute = json_decode($blg->attribute, true); 
                            @endphp
                            @foreach($attribute as $attr)
                                 <span class="badge badge-dark"> {{$attr}}  </span>
                            @endforeach
                        </td>
                        <td> 
                            <form action="{{route('nick.destroy',[$blg->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('nick.edit', $blg->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$nicks->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection