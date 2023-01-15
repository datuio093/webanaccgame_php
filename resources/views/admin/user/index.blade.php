@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection

<div class="row justify-content-center ">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách user</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- <a href="{{route('user.create')}}" class="btn btn-success"> Thêm user</a> --}}
                <table class="table table-striped" id="myTable">
                    <tr>
                      <th>ID</th>
                      <th>Tên User </th>
                      <th>Gmail </th>
                      <th> Role </th>
                      <th> Số Dư </th>
                   
                   
                      <th></th>
                 
                    </tr>

                    @foreach ($user as $key => $slie)
                    <tr>
                      
                        <td>{{$slie->id}}</td>
                        <td>{{$slie->name}}</td>
                        <td>{{$slie->email}}</td>
                        <td>{{$slie->role == "1" ? "Admin": "User"}}</td>
                        <td>{{$slie->money}}</td>
                  
                        
                     
                
                        <td> 
                            <form action="{{route('user.destroy',[$slie->id] )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                            </form> 
                            <a href="{{route('user.edit', $slie->id)}}" class="btn btn-warning"> Sửa</a> </td>
                      </tr>
                    @endforeach
             
                  </table>
                            {{$user->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection