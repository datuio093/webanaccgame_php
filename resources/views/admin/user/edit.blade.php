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
                <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data" class="col-12">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                      <label for="">UserName</label>
                      <input disabled type="text" name="taikhoan" class="form-control"  id="slug"  value="{{$user->name}}">
      
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input disabled type="text" name="matkhau" class="form-control" aria-describedby="emailHelp" value="{{$user->email}}">
                   
                    </div>

                    {{-- <div class="form-group">
                        <label for="">Mật Khẩu</label>
                        <input disabled type="text" name="matkhau" class="form-control" aria-describedby="emailHelp" value="{{Crypt::decryptString($user->password)}}">
                     
                      </div> --}}

                    <div class="form-group">
                      <label for="">Số Dư</label>
                      <input type="text" name="sodu" class="form-control" aria-describedby="emailHelp" value="{{$user->money}}">
                   
                    </div>
   
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Quyền</label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                            @if ($user->role==1)
                            <option selected value="1">Admin</option>
                            <option value="0">User</option>
                            @else
                            <option value="1">Admin</option>
                            <option selected value="0">User</option>
                            @endif

                        </select>
                     </div>

              

                 
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                        
            </div>
        </div>
    </div>
</div>

@endsection