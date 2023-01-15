@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection

<div class="row justify-content-center ">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Thẻ Nạp</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('thenap.create')}}" class="btn btn-success"> Thêm Thẻ Nạp</a>
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Seri </th>
                      <th>Mã Thẻ </th>
                      <th> Tình Trạng </th>
                      <th> Mệnh Giá </th>
                      <th> User Nạp </th>
                   
                   
                      <th></th>
                 
                    </tr>

                    @foreach ($thenap as $key => $slie)
                    <tr>
                      
                        <td>{{$slie->id}}</td>
                        <td>{{$slie->seri}}</td>
                        <td>{{$slie->mathe}}</td>
                        <td>{{$slie->status == "1" ? "Đã Nạp": "Chưa Nạp"}}</td>
                        <td>{{$slie->menhgia}}</td>
                        <td>{{$slie->user_id}}</td>
                  
                        
                     
                
                        <td> 
                            <form action="{{route('thenap.destroy',[$slie->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('thenap.edit', $slie->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$thenap->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection