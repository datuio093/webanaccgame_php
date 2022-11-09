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

                <a href="{{route('accessories.create')}}" class="btn btn-success"> Thêm Danh Mục Game</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Tên Phụ Kiện</th>
                      <th>Hiển Thị</th>
                      <th>Thuộc Game</th>
                      <th>Quản Lý</th>
        
                    </tr>

                    @foreach ($accessories as $key => $blg)
                    <tr>
                        <td>{{$key}}</td>
                        <td style="max-width: 100px">{{$blg->title}}</td>
  
            
                        <td>
                           @if ($blg->status == 0)
                               Không Hiển Thị
                           @else
                                Hiển Thị
                           @endif
                               
                        </td>
                        <td>{{$blg->category->title}}</td>
              
                
                        <td> 
                            <form action="{{route('accessories.destroy',[$blg->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('accessories.edit', $blg->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$accessories->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection